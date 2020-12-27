<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Boarding;
use App\Models\Furniture;
use App\Models\LikePost;
use App\Models\Payment;
use App\Models\PlaceAround;
use App\Models\Post;
use App\Models\TypeBoarding;
use App\Models\User;
use Cassandra\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function Store(Request $request)
    {

    }

    //Tạo bài viết mới
    public function CreatePost(Request $request)
    {

        if (Auth::Check() && Auth::User()->role_id == 2 and Auth::User()->status == 1) {
            try {
                $request->validate([
                    'title' => 'required|unique:posts',
                    'address' => 'required',
                    'price' => 'required',
                    'description' => 'required',
                    'area' => 'required',
                ],
                    [
                        'title.required' => 'Nhập tiêu đề bài đăng',
                        'title.unique'  => 'Tiêu đề đã tồn tại',
                        'price.required' => 'Nhập giá thuê phòng trọ',
                        'description.required' => 'Nhập mô tả ngắn cho phòng trọ',
                        'address.required' => 'Nhập  địa chỉ phòng trọ ',
                        'area.required' => 'Nhập diện tích phòng trọ'
                    ]);
                //Tạo địa chỉ mới
                $address = new Address;
                $address->storeAddress($request);
                //tìm kiểu phòng trọ
                $type_id = TypeBoarding::where('name', $request->type)->first()->id;
                /* Check file và lưu file hình ảnh */
                $json_img = "";
                if ($request->hasFile('hinhanh')) {
                    $arr_images = array();
                    $inputfile = $request->file('hinhanh');
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
                $post->user_id = Auth::user()->id;
                $post->title = $request->title;
                $post->boarding_id = $boarding->id;
                $post->number_date = $request->number_date;
                $post->slug = Str::slug($post->title, '-');
                $post->save();
                //tạo hóa đơn
                $payment = new Payment;
                $payment->post_id = $post->id;
                $payment->money = env('POST_PRICE') * $post->number_date;
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
                'message' => 'Bạn chưa đăng nhập hoặc không có quyền đăng bài!'
            ], 401);
        }
    }

    //Chỉnh sửa bài viết mới
    public function UploadPost(Request $request, $id)
    {
        $post = Post::find($id);
        if (Auth::Check()) {

            if (Auth::User()->role_id == 1 || (Auth::User()->id == $post->user_id && $post->status_review == 0)) {

                $boarding = Boarding::find($post->boarding_id);
                $address = Address::find($boarding->address_id);
                $address->storeAddress($request);
                //tìm kiểu phòng trọ
                $type_id = TypeBoarding::where('name', $request->type)->first()->id;
                /* Check file và lưu file hình ảnh */
                $json_img = "";
                if ($request->hasFile('hinhanh')) {
                    $arr_images = array();
                    $inputfile = $request->file('hinhanh');
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
                $post->number_date = $request->number_date;
                $post->save();
                //cập nhật hóa đơn
                $payment = $post->payments()->orderBy('id', 'DESC')->first();
                $payment->money = env('POST_PRICE') * $post->number_date;
                $payment->save();

                return response()->json([
                    'message' => 'Bài viết đã được cập nhật!',
                    'code' => 1,
                ], 401);

            } else if (Auth::User()->role_id == 3) {
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
    public function GetPost($id)
    {
        $arr_post = [];
        $post = Post::find($id);
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

        return response()->json([
            $arr_post
        ]);
    }


    //Update trạng thái phòng trọ
    public function UploadBoarding(Request $request, $id)
    {
        $post = Post::find($id);
        $boarding = Boarding::find($post->boarding_id);
        if (Auth::Check() && (Auth::User()->id == $post->user_id || Auth::User()->role_id == 1)) {
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
     *  Phê duyệt bài post
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function approvalPost($id)
    {
        if (Auth::Check() && Auth::User()->role_id == 1) {
            $post = Post::find($id);
            $post->status_review = 1;
            $post->time_display = Carbon::now()->addDays($post->number_date);
            $post->save();
            $payment = $post->payments()->orderBy('id', 'DESC')->first();
            $payment->status = 1;
            $payment->save();
            return response()->json([
                'message' => 'Phê duyệt bài viết thành công!'
            ], 201);

        } else {
            return response()->json([
                'message' => 'Bạn không có quyền phê duyệt!',

            ], 401);
        }
    }

    /**
     * Hiển thị danh sách bài viết chưa phê duyệt
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getUnapprovedPost()
    {
        if (Auth::Check() && Auth::User()->role_id == 1) {
            return response()->json([
                Post::where('status_review', 0)->get()
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

        if (Auth::Check() && Auth::User()->role_id == 1) {
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
        if (Auth::Check() && (Auth::User()->role_id == 1 || Auth::User()->role_id == 2)) {
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

        if (Auth::Check() && (Auth::User()->role_id == 1 || Auth::User()->role_id == 2)) {
            return response()->json([
                DB::table('posts')->where('user_id', $user_id)->where('status_review', 2)->get()
            ], 201);
        } else {
            return response()->json([
                'message' => 'Bạn không có quyền!',

            ], 401);
        }
    }

    //Gia hạn bài đăng
    public function postExtension($post_id, Request $request)
    {
        $post = Post::find($post_id);
        if (Auth::Check()) {

            if (Auth::User()->role_id == 1 || (Auth::User()->id == $post->user_id && $post->status_review == 0)) {
                $post->number_date = $request->number_date;
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
    public function paymentUser($user_id){
        $posts = DB::table('posts')->where('user_id', $user_id)->where('status_review', 0)->get();
        $sum =0;
        foreach($posts as $post){
            $sum = $sum + $post->payments()->orderBy('id', 'DESC')->first()->money;
        }
        return response()->json([
            $sum
        ], 201);
    }
    //Lưu vào danh sach yêu thích
    public function postLikePost($post_id){
        $like_post = new LikePost;
        $like_post->post_id = $post_id;
        $like_post->user_id = Auth::User()->id;
        $like_post->save();
        return response()->json([
            'message' => 'Thích thành công!',
            'code' => 2,
        ], 201);

    }
    //Xóa vào danh sach yêu thích
    public function UnLikePost($user_id,$post_id){
        $like_post = DB::table('like_posts')->where('post_id',$post_id)->where('user_id',$user_id)->get();
        if (! $like_post) {
            return response()
                ->json(['error' => 'Error: Không tìm đc lượt thích']);
        }
        $like_post->delete();
        return response()->json([
            'message' => 'xóa bài lượt thành công!',
            'code' => 2,
        ], 201);

    }
    // Lấy ra lượt like của post
    public function getLikePost(){
        $like_post = DB::table('like_posts')
                        ->select('post_id', DB::raw('count(*) as total_likes'))
                        ->groupBy('post_id')
                        ->orderBy('count(*)', 'DESC')
                        ->get();
        return response()->json([
            'message' => $like_post,
        ], 201);
    }
    // Lấy ra sanh sách yêu thích của một user
    public function getPostLike($user_id)
    {
        $like_post_id = DB::table('like_posts')->select('post_id')->where('user_id',$user_id)->get();
        $post_like = [];
        foreach($like_post_id as $id)
        {
            $post_like[] = Post::find($id);
        }
        return response()->json([
            'message' => $post_like,
        ], 201);

    }
    // Nhận thông báo bài được duyệt
    //Xem thống kê lượt xem
        //Thống kê bài post theo ngày
    public function thongKeDay($post_id){
        $post = Post::find(1);

        $sum = visits($post)->count();
        return response()->json($sum);
    }
    //chat
    //Tìm kiếm phòng trọ
    //Thêm Review/bình luận
    //Lấy Review/bình luận
    // Report bài không hợp lệ
    // lấy bài viết nhiều like
    // lấy bài viết nhiều view
    //tìm top bài đăng gần đây nhất
    //Xóa bài post


}



