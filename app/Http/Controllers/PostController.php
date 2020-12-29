<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Boarding;
use App\Models\Comment;
use App\Models\Furniture;
use App\Models\LikePost;
use App\Models\Payment;
use App\Models\PlaceAround;
use App\Models\Post;
use App\Models\Report;
use App\Models\SeenPost;
use App\Models\TypeBoarding;
use App\Models\User;
use Cassandra\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use mysql_xdevapi\Collection;
use stdClass;

class PostController extends Controller
{
    public function Store(Request $request)
    {

    }

    //Tạo bài viết mới
    public function CreatePost(Request $request)
    {

        if (auth('api')->check()) {
            if ((auth('api')->user()->role_id == 2 && auth('api')->user()->status == 1) || auth('api')->user()->role_id == 1) {
                try {
                    $request->validate([
                        'title' => 'required|unique:posts',
                        'address' => 'required',
                        'price' => 'required',
                        'description' => 'required',
                        'area' => 'required',
                        'rooms' => 'required',
                    ],
                        [
                            'title.required' => 'Nhập tiêu đề bài đăng',
                            'title.unique' => 'Tiêu đề đã tồn tại',
                            'price.required' => 'Nhập giá thuê phòng trọ',
                            'description.required' => 'Nhập mô tả ngắn cho phòng trọ',
                            'address.required' => 'Nhập  địa chỉ phòng trọ ',
                            'area.required' => 'Nhập diện tích phòng trọ',
                            'rooms.required' => 'Nhập số lượng phòng trọ'
                        ]);
                    //Tạo địa chỉ mới
                    $address = new Address;
                    $address->storeAddress($request);
                    //tìm kiểu phòng trọ
                    $type_id = TypeBoarding::where('name', $request->type)->first()->id;
                    /* Check file và lưu file hình ảnh */
                    $json_img = "";
                    if ($request->hasFile('images')) {
                        $arr_images = array();
                        $inputfile = $request->file('images');
                        foreach ($inputfile as $filehinh) {
                            $namefile = "phongtro-" . str_random(5) . "-" . $filehinh->getClientOriginalName();
                            while (file_exists('uploads/images' . $namefile)) {
                                $namefile = "phongtro-" . str_random(5) . "-" . $filehinh->getClientOriginalName();
                            }
                            $arr_images[] = $namefile;
                            $filehinh->move('uploads/images', $namefile);
                        }
                        $json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
                    } else {
                        $arr_images[] = "no_img_room.png";
                        $json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
                    }
                    //tạo phòng trọ mới
                    $boarding = new Boarding;
                    $boarding->price = $request->price;
                    $boarding->area = $request->area;
                    $boarding->description = $request->description;
                    $boarding->address_id = $address->id;
                    $boarding->type_id = $type_id;
                    $boarding->images = $json_img;
//                $boarding->images=json_encode($request->img,JSON_FORCE_OBJECT); ;
                    $boarding->is_owner = $request->is_owner;
                    $boarding->electricity_water = $request->electricity_water;
                    if ($boarding->electricity_water == 1) {
                        $boarding->electricity_price = $request->electricity_price;
                        $boarding->water_price = $request->water_price;
                    }
                    $boarding->save();

                    //Tìm hoặc tạo mới địa điểm gần trường
                    $arr_palce_arounds_name = explode(",", $request->palce_arounds);
                    foreach ($arr_palce_arounds_name as $palce_around_name) {
                        $palce_around = PlaceAround::firstOrCreate(['name' => $palce_around_name]);
                        $palce_around->boardings()->attach($boarding->id);
                    }
                    // Tìm hoặc tạo mới tiện tích
                    $arr_furniturs_name = explode(",", $request->furniture);
                    foreach ($arr_furniturs_name as $furnitur_name) {
                        $furnitur = Furniture::firstOrCreate(['name' => $furnitur_name]);
                        $furnitur->boardings()->attach($boarding->id);
                    }
                    // Tạo bài viết mới
                    $post = new Post;
                    $post->user_id = auth('api')->user()->id;
                    $post->title = $request->title;
                    $post->boarding_id = $boarding->id;
                    $post->number_date = $request->number_date;
                    $post->slug = Str::slug($post->title, '-');
                    $post->rooms = $request->rooms;
                    $post->save();
                    //tạo hóa đơn
                    $payment = new Payment;
                    $payment->post_id = $post->id;
                    $payment->money = $request->money;
                    $payment->save();

                    return response()->json([
                        'message' => 'Tạo bài viết mới thành công!'
                    ], 201);
                } catch (Exception $e) {
                    return response()->json([
                        'message' => 'Tạo bài viết mới không thành công!'
                    ], 401);
                }
            } else {
                return response()->json([
                    'message' => 'Bạn không có quyền đăng bài!',
                    'user' => auth('api')->user()
                ], 401);
            }
        } else {
            return response()->json([
                'message' => 'Bạn chưa đăng nhập!',
                'user' => auth('api')->user()
            ], 401);
        }
    }

    //Chỉnh sửa bài viết mới
    public function UploadPost(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|unique:posts',
            'address' => 'required',
            'price' => 'required',
            'description' => 'required',
            'area' => 'required',
            'rooms' => 'required',
        ],
            [
                'title.required' => 'Nhập tiêu đề bài đăng',
                'title.unique' => 'Tiêu đề đã tồn tại',
                'price.required' => 'Nhập giá thuê phòng trọ',
                'description.required' => 'Nhập mô tả ngắn cho phòng trọ',
                'address.required' => 'Nhập  địa chỉ phòng trọ ',
                'area.required' => 'Nhập diện tích phòng trọ',
                'rooms.required' => 'Nhập số lượng phòng trọ'
            ]);
        $post = Post::find($id);
        if (auth('api')->check()) {

            if (auth('api')->user()->role_id == 1 || (auth('api')->user()->id == $post->user_id && $post->status_review == 0)) {

                $boarding = Boarding::find($post->boarding_id);
                $address = Address::find($boarding->address_id);
                $address->storeAddress($request);
                //tìm kiểu phòng trọ
                $type_id = TypeBoarding::where('name', $request->type)->first()->id;
                /* Check file và lưu file hình ảnh */
                $json_img = "";
                if ($request->hasFile('images')) {
                    $arr_images = array();
                    $inputfile = $request->file('images');
                    foreach ($inputfile as $filehinh) {
                        $namefile = "phongtro-" . str_random(5) . "-" . $filehinh->getClientOriginalName();
                        while (file_exists('uploads/images' . $namefile)) {
                            $namefile = "phongtro-" . str_random(5) . "-" . $filehinh->getClientOriginalName();
                        }
                        $arr_images[] = $namefile;
                        $filehinh->move('uploads/images', $namefile);
                    }
                    $json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
                } else {
                    $arr_images[] = "no_img_room.png";
                    $json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
                }

//                Xóa tiện ích và những địa chỉ công cộng xung quanh
                $arr_furnitures_id = [];
                $arr_palce_arounds_id = [];
                foreach ($boarding->furnitures as $furniture) {
                    $arr_furnitures_id[] = $furniture->name;
                }
                foreach ($boarding->palce_arounds as $palce_around) {
                    $arr_palce_arounds_id[] = $palce_around->name;
                }
//                $boarding->furnitures()->detach();
                $boarding->furnitures()->detach($arr_furnitures_id);
                $boarding->palce_arounds()->detach($arr_furnitures_id);
                //Tìm hoặc tạo mới địa điểm gần trường
                $arr_palce_arounds_name = explode(",", $request->palce_arounds);
                foreach ($arr_palce_arounds_name as $palce_around_name) {
                    $palce_around = PlaceAround::firstOrCreate(['name' => $palce_around_name]);
                    $palce_around->boardings()->attach($boarding->id);
                }
                // Tìm hoặc tạo mới tiện tích
                $arr_furniturs_name = explode(",", $request->furniture);
                foreach ($arr_furniturs_name as $furnitur_name) {
                    $furnitur = Furniture::firstOrCreate(['name' => $furnitur_name]);
                    $furnitur->boardings()->attach($boarding->id);
                }

                //Cập nhật nhà trọ
                $boarding->price = $request->price;
                $boarding->area = $request->area;
                $boarding->description = $request->description;
                $boarding->address_id = $address->id;
                $boarding->type_id = $type_id;
                $boarding->images = $json_img;
//                $boarding->images=json_encode($request->img,JSON_FORCE_OBJECT); ;
                $boarding->is_owner = $request->is_owner;
                $boarding->electricity_water = $request->electricity_water;
                if ($boarding->electricity_water == 1) {
                    $boarding->electricity_price = $request->electricity_price;
                    $boarding->water_price = $request->water_price;
                }
                $boarding->save();
//                Chinh sửa bài viết
                $post->title = $request->title;
                $post->rooms = $request->rooms;
                $post->number_date = $request->number_date;
                $post->save();
                //cập nhật hóa đơn
                $payment = $post->payments()->orderBy('id', 'DESC')->first();
                $payment->money = $request->money;
                $payment->save();

                return response()->json([
                    'message' => 'Bài viết đã được cập nhật!',
                    'code' => 1,
                ], 401);

            } else if (auth('api')->user()->role_id == 3) {
                return response()->json([
                    'message' => 'Bạn không có quyền chỉnh sửa!',
                    'code' => 1,
                ], 401);
            } else {
                return response()->json([
                    'message' => 'Bài viết đã được Phê duyệt. Chỉ có admin mới có quyền chỉnh sửa!',
                    'code' => 2,
                ], 401);
            }
        }
    }

    //Lấy toàn bộ thông tin bài viết
    public function GetPostById($id)
    {
        $arr_post = [];
        $post = Post::find($id);
        if ($post == null) {
            return response()->json([
                'message' => "Không tìm được bài phù hợp",
            ]);
        }

        $arr_furnitures = [];
        $arr_palce_arounds = [];
        $user_post = User::find($post->user_id);
        $boarding = Boarding::find($post->boarding_id);
        $address_json = Address::find($boarding->address_id);
        $address_json_user = Address::find($user_post->address_id);
        $address_user = $address_json_user->number . "," . $address_json_user->street . "," . $address_json_user->wards . "," . $address_json_user->district . "," . $address_json_user->provinces;
        $type_boardings = TypeBoarding::find($boarding->type_id)->name;
        $address = $address_json->number . "," . $address_json->street . "," . $address_json->wards . "," . $address_json->district . "," . $address_json->provinces;
        $payment = $post->payments()->orderBy('id', 'DESC')->first();
        foreach ($boarding->furnitures as $furniture) {
            $arr_furnitures[] = $furniture->name;
        }
        foreach ($boarding->palce_arounds as $palce_around) {
            $arr_palce_arounds[] = $palce_around->name;
        }
        $arr_post['type_boarding'] = $type_boardings;
        $arr_post['address_boarding'] = $address;
        $arr_post['furnitures'] = $arr_furnitures;
        $arr_post['places_around'] = $arr_palce_arounds;
        $arr_post['post'] = $post;
        $arr_post['user'] = $user_post;
        $arr_post['boarding'] = $boarding;
        $arr_post['payment'] = $payment;
        $arr_post['address_user'] = $address_user;
        $arr_post['post_created_at'] = $post->created_at->format('Y-m-d');

        if ($post->time_display) {
            $arr_post['post_time_display'] = $post->time_display->format('Y-m-d');
        }
        visits($post)->increment();
        $to_day = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $seen_post = DB::table('seen_posts')
            ->where('post_id', $post->id)
            ->where('time_seen', $to_day);
        if ($seen_post->exists()) {
            $seen_post_count = $seen_post->first()->count;
            $seen_post->update(['count' => $seen_post_count + 1]);
        } else {
            $seen_post = new SeenPost;
            $seen_post->time_seen = $to_day;
            $seen_post->post_id = $post->id;
            $seen_post->count = $seen_post->count + 1;
            $seen_post->save();
        }
        $seen_post_count = DB::table('seen_posts')
            ->where('post_id', $post->id)
            ->groupBy('post_id')
            ->count();
        $like_post_count = DB::table('like_posts')
            ->where('post_id', $post->id)
            ->groupBy('post_id')
            ->count();
        $comments = DB::table('comments')
            ->where('post_id', $post->id)
            ->get();
        $arr_post['like_post'] = $like_post_count;
        $arr_post['seen_post'] = $seen_post_count;
        $arr_post['comment'] = $comments;
        return response()->json([
            $arr_post
        ]);
    }

    //Lấy nhà trọ theo slug
    public function GetPostBySlug($slug)
    {
        $arr_post = [];
        $post = Post::where('slug', $slug)->first();
        if ($post == null) {
            return response()->json([
                'message' => "Không tìm được bài phù hợp",
            ]);
        }
        $arr_furnitures = [];
        $arr_palce_arounds = [];
        $user_post = User::find($post->user_id);
        $boarding = Boarding::find($post->boarding_id);
        $address_json = Address::find($boarding->address_id);
        $type_boardings = TypeBoarding::find($boarding->type_id)->name;
        $address = $address_json->number . "," . $address_json->street . "," . $address_json->wards . "," . $address_json->district . "," . $address_json->provinces;
        $payment = $post->payments()->orderBy('id', 'DESC')->first();
        foreach ($boarding->furnitures as $furniture) {
            $arr_furnitures[] = $furniture->name;
        }
        foreach ($boarding->palce_arounds as $palce_around) {
            $arr_palce_arounds[] = $palce_around->name;
        }


        $boarding['type_boarding'] = $type_boardings;
        $boarding['address'] = $address;
        $boarding['furnitures'] = $arr_furnitures;
        $boarding['palce_around'] = $arr_palce_arounds;
        $arr_post['post'] = $post;
        $arr_post['user'] = $user_post;
        $arr_post['boarding'] = $boarding;
        $arr_post['payment'] = $payment;
        visits($post)->increment();
        $to_day = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $seen_post = DB::table('seen_posts')
            ->where('post_id', $post->id)
            ->where('time_seen', $to_day);
        if ($seen_post->exists()) {
            $seen_post_count = $seen_post->first()->count + 1;
            $seen_post->update(['count' => $seen_post_count]);
        } else {
            $seen_post = new SeenPost;
            $seen_post->time_seen = $to_day;
            $seen_post->post_id = $post->id;
            $seen_post_count = $seen_post->count = $seen_post->count + 1;
            $seen_post->save();
        }
        $seen_post_count = DB::table('seen_posts')
            ->select(DB::raw('SUM(count) as total_seens'))
            ->where('post_id', $post->id)
            ->groupBy('post_id')
            ->get();
        $arr_post['seen_post'] = $seen_post_count;

        return response()->json([
            $arr_post
        ]);
    }


    //Update trạng thái phòng trọ
    public function UploadBoarding(Request $request, $id)
    {
        $post = Post::find($id);
        $boarding = Boarding::find($post->boarding_id);
        if (auth('api')->Check() && (auth('api')->user()->id == $post->user_id || auth('api')->user()->role_id == 1)) {
            if ($request->status == 'Chưa được thuê') {
                $boarding->status = 0;
                $post->status_review = 1;
            } else if ($request->status == 'Đã được thuê') {
                $boarding->status = 1;
                $post->status_review = 2;
            }
            $boarding->save();
            $post->save();
            return response()->json([
                'message' => 'Đã cập nhật thành công!',
            ], 201);
        } else {
            return response()->json([
                'message' => 'Bạn không có quyền cập nhật!',
                'code' => 1,
            ], 401);
        }
    }


    /**
     * Hiển thị danh sách bài viết đã phê duyệt
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getApprovedPost()
    {
        return response()->json([
            Post::where('status_review', 1)->get()
        ], 201);

    }

    /**
     * Hiển thị danh sách bài viết hết hạn
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getExpiredPost()
    {

        if (auth('api')->check() && auth('api')->user()->role_id == 1) {
            return response()->json([
                Post::where('status_review', 2)->get()
            ], 201);
        } else {
            return response()->json([
                'message' => 'Bạn không có quyền!',

            ], 401);
        }
    }

    /**
     * Hiển thị danh sách bài viết chưa phê duyệt của một chủ trọ
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getUnapprovedPostOfUser($user_id)
    {
        if (auth('api')->check() && (auth('api')->user()->role_id == 1 || auth('api')->user()->role_id == 2)) {
            return response()->json([
                DB::table('posts')->where('user_id', $user_id)->where('status_review', 0)->get()
            ], 201);
        } else {
            return response()->json([
                'message' => 'Bạn không có quyền!',

            ], 401);
        }
    }

    /**
     * Hiển thị danh sách bài viết đã phê duyệt
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getApprovedPostOfUser($user_id)
    {
        return response()->json([
            DB::table('posts')->where('user_id', $user_id)->where('status_review', 1)->get()
        ], 201);
    }

    /**
     * Hiển thị danh sách bài viết hết hạn cua một chủ trọ
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getExpiredPostOfUser($user_id)
    {

        if (auth('api')->check() && (auth('api')->user()->role_id == 1 || auth('api')->user()->role_id == 2)) {
            return response()->json([
                DB::table('posts')->where('user_id', $user_id)->where('status_review', 2)->get()
            ], 201);
        } else {
            return response()->json([
                'message' => 'Bạn không có quyền!',

            ], 401);
        }
    }

    //Yêu cầu Gia hạn bài đăng
    public function postExtension($post_id, Request $request)
    {
        $post = Post::find($post_id);
        if (auth('api')->check()) {

            if (auth('api')->user()->role_id == 1 || (auth('api')->user()->id == $post->user_id && $post->status_review == 0)) {
                $post->number_date = $request->number_date;
                $post->status_review = 0;
                $post->save();
                //cập nhật hóa đơn
                $payment = new Payment;
                $payment->money = env('POST_PRICE') * $post->number_date;
                $payment->save();
                return response()->json([
                    'message' => 'Đã gia hạn thành công!',

                ], 201);
            }
        } else {
            return response()->json([
                'message' => 'Gia hạn không thành công!',
                'code' => 2,
            ], 401);
        }
    }

    //lấy số tiền phải thanh toán của một chủ nhà trọ
    public function paymentUser($user_id)
    {
        $posts = DB::table('posts')->where('user_id', $user_id)->where('status_review', 0)->get();
        $sum = 0;
        foreach ($posts as $post) {
            $sum = $sum + $post->payments()->orderBy('id', 'DESC')->first()->money;
        }
        return response()->json([
            $sum
        ], 201);
    }

    //Lưu vào danh sach yêu thích
    public function postLikePost($post_id)
    {
        $like_post = new LikePost;
        $like_post->post_id = $post_id;
        $like_post->user_id = auth('api')->user()->id;
        $like_post->save();
        return response()->json([
            'message' => 'Thích thành công!',
            'code' => 2,
        ], 201);

    }

    //Xóa vào danh sach yêu thích
    public function UnLikePost( $post_id)
    {
        $like_post = DB::table('like_posts')->where('post_id', $post_id)->where('user_id', auth('api')->user()->id)->get();
        if (!$like_post) {
            return response()
                ->json(['error' => 'Error: Không tìm đc lượt thích']);
        }
        $like_post->delete();
        return response()->json([
            'message' => 'xóa bài lượt thành công!',
            'code' => 2,
        ], 201);

    }

    // Lấy ra sanh sách yêu thích của một user
    public function getPostLike($user_id)
    {
        $like_post_id = DB::table('like_posts')->select('post_id')->where('user_id', $user_id)->get();
        $post_like = [];
        foreach ($like_post_id as $id) {
            $post_like[] = Post::find($id);
        }
        return response()->json([
            'message' => $post_like,
        ], 201);

    }

    // Lấy ra lượt like của các post
    public function getLikePost()
    {
        $like_post = DB::table('like_posts')
            ->select('post_id', DB::raw('count(*) as total_likes'))
            ->groupBy('post_id')
            ->orderBy('count(*)', 'DESC')
            ->get();
        return response()->json([
            'message' => $like_post,
        ], 201);
    }

    // Nhận thông báo bài được duyệt
    //chat
    //Tìm kiếm phòng trọ
    //Thêm Review/bình luận
    public function userComment($id, Request $request)
    {
        $comment = new Comment;
        $comment->post_id = $id;
        $comment->content = $request->content_resport;
        $comment->reply_for = auth('api')->user()->id;
        $comment->rating = $request->rating;
        $comment->save();
        return response()->json(['thongbao', 'Cảm ơn bạn đã bình luận, đội ngũ chúng tôi sẽ xem xét']);
    }

    //Lấy Review/bình luận
    public function getComment($id)
    {
        $comments = Comment::all()->count();
        $post = Post::all();
        return response()->json([
            'posts' => $post,
            'reports' => $comments
        ]);
    }

    // Report bài không hợp lệ
    public function userReport($id, Request $request)
    {
        $report = new Report;
        $report->post_id = $id;
        $report->content = $request->content_resport;
        $report->save();
        return response()->json(['thongbao', 'Cảm ơn bạn đã báo cáo, đội ngũ chúng tôi sẽ xem xét']);
    }

    //Lấy post gần đây
    public function getRecentPosts()
    {
        $response = [];
        $posts = Post::all()->sortByDesc('id')->take(6);
        foreach ($posts as $post) {
            $arr_post = [];
            $user_post = User::find($post->user_id);
            $user_name = $user_post->firstname . ' ' . $user_post->lastname;
            $boarding = Boarding::find($post->boarding_id);
            $type_boardings = TypeBoarding::find($boarding->type_id)->name;
            $boarding['type_boarding'] = $type_boardings;
            $arr_post['id'] = $post->id;
            $arr_post['title'] = $post->title;
            $arr_post['description'] = $boarding->description;
            $arr_post['user'] = $user_name;
            $arr_post['image'] = $boarding->images;
            $arr_post['price'] = $boarding->price;
            $arr_post['area'] = $boarding->area;
            $arr_post['created_at'] = $post->created_at->format('Y-m-d');
            $arr_post['status_review'] = $post->status_review;
            $arr_post['time_display'] = $post->time_display;
            $seen_post_count = DB::table('seen_posts')
                ->select(DB::raw('SUM(count) as total_seens'))
                ->where('post_id', $post->id)
                ->groupBy('post_id')
                ->get();
            $arr_post['seen_post'] = $seen_post_count;
            $response[] = $arr_post;
        }
        return response()->json([
            $response
        ]);
    }

    //tìm kiếm
    public function basicSearch(Request $request)
    {
        $response = [];
        $addresses = '';
        if ($request->provinces) {
            $addresses = DB::table('addresses')->where('provinces', $request->provinces);
            if ($request->district) {
                $addresses = $addresses->where('district', $request->district);
                if ($request->wards) {
                    $addresses = $addresses->where('wards', $request->wards);
                }
            }
            $addresses = $addresses->get();
        }


        if ($addresses) {
            $boardings = '';
            foreach ($addresses as $address) {
                if ($request->furniture) {
                    $check = true;
                    $list_furniture_id = [];
                    $arr_furniturs_name_request = explode(",", $request->furniture);
                    foreach ($arr_furniturs_name_request as $furnitur_name) {
                        $list_furniture_id [] = Furniture::where(['name' => $furnitur_name])->first()->id;
                    }
                    $boardings_t = DB::table('boardings')
                        ->join('boarding_furnitures', 'boarding_furnitures.boarding_id', '=', 'boardings.id')
                        ->where();
                    foreach ($list_furniture_id as $id) {
                        $boardings = $boardings->where('boarding_furnitures.furniture_id', $id);
                    }
                } else {
                    $boardings_t = DB::table('boardings');
                }
                $boardings_t = $boardings_t->where('address_id', $address->id);
                if (!$boardings_t->get()) {
                    continue;
                }

                if ($request->type) {
                    $type_id = TypeBoarding::where('name', $request->type)->first()->id;
                    $boardings_t = $boardings_t->where('type_id', $type_id);
                }

                if ($request->price_min) {
                    $boardings_t = $boardings_t->whereBetween('price', [$request->price_min, $request->price_max]);
                }
                if ($request->area_min) {
                    $boardings_t = $boardings_t->whereBetween('area', [$request->area_min, $request->area_max]);
                }
                if ($boardings != '') {
                    $boardings = $boardings->merge($boardings_t->get());
                } else {
                    $boardings = $boardings_t->get();
                }
            }
        } else {

            $boardings = DB::table('boardings');

            if ($request->furniture) {
                $check = true;
                $list_furniture_id = [];
                $arr_furniturs_name_request = explode(",", $request->furniture);
                foreach ($arr_furniturs_name_request as $furnitur_name) {
                    $list_furniture_id [] = Furniture::where(['name' => $furnitur_name])->first()->id;
                }
                $boardings = $boardings
                    ->join('boarding_furnitures', 'boarding_furnitures.boarding_id', '=', 'boardings.id');
                foreach ($list_furniture_id as $id) {
                    $boardings = $boardings->where('boarding_furnitures.furniture_id', $id);
                }
            }
            if ($request->type) {
                $type_id = TypeBoarding::where('name', $request->type)->first()->id;
                $boardings = $boardings->where('type_id', $type_id);
            }

            if ($request->price_min) {
                $boardings = $boardings->whereBetween('price', [$request->price_min, $request->price_max]);
            }

            if ($request->area_min) {
                $boardings = $boardings->whereBetween('area', [$request->area_min, $request->area_max]);
            }

            $boardings = $boardings->get();
        }

        if ($boardings) {
            foreach ($boardings as $boarding) {
                $post = DB::table('posts')->where('boarding_id', $boarding->id)->first();
                $arr_post = [];
                $user_post = User::find($post->user_id);
                $user_name = $user_post->firstname . ' ' . $user_post->lastname;
                $boarding = Boarding::find($post->boarding_id);
                $type_boardings = TypeBoarding::find($boarding->type_id)->name;
                $boarding['type_boarding'] = $type_boardings;
                $arr_post['id'] = $post->id;
                $arr_post['title'] = $post->title;
                $arr_post['description'] = $boarding->description;
                $arr_post['user'] = $user_name;
                $arr_post['image'] = $boarding->images;
                $arr_post['price'] = $boarding->price;
                $arr_post['area'] = $boarding->area;
                $arr_post['created_at'] = $post->created_at;
                $arr_post['status_review'] = $post->status_review;
                $arr_post['time_display'] = $post->time_display;
                $response[] = $arr_post;
            }
        }
        return response()->json([
            $response,


        ]);

    }


    // lấy bài viết nhiều like
    // lấy bài viết nhiều view
    //tìm top bài đăng gần đây nhất


}



