<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Boarding;
use App\Models\LikePost;
use App\Models\Post;
use App\Models\Report;
use App\Models\SeenPost;
use App\Models\TypeBoarding;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class AdminController extends Controller
{
    public function getIndex(){
        $total_users_active = User::where('status',1)->get()->count();
        $total_users_deactive = User::where('status',0)->get()->count();
        $total_rooms_approve = Post::where('status_review',1)->get()->count();
        $total_rooms_unapprove = Post::where('status_review',0)->get()->count();
        $total_rooms_expired = Post::where('status_review',2)->get()->count();
        $reports = Report::all();
        return response()->json([
            'total_users_active'=>$total_users_active,
            'total_users_deactive'=>$total_users_deactive,
            'total_rooms_approve'=>$total_rooms_approve,
            'total_rooms_unapprove'=>$total_rooms_unapprove,
            'total_rooms_expired' =>$total_rooms_expired,
            'total_report'=>$reports->count(),
        ]);
    }
    public function getStatistical(){
        $total_users_active = User::where('status',1)->get()->count();
        $total_users_deactive = User::where('status',0)->get()->count();
        $total_rooms_approve = Post::where('status_review',1)->get()->count();
        $total_rooms_unapprove = Post::where('status_review',0)->get()->count();
        $total_rooms_expired = Post::where('status_review',2)->get()->count();
        $reports = Report::all();
        return response()->json([
            'total_users_active'=>$total_users_active,
            'total_users_deactive'=>$total_users_deactive,
            'total_rooms_approve'=>$total_rooms_approve,
            'total_rooms_unapprove'=>$total_rooms_unapprove,
            'total_rooms_expired' =>$total_rooms_expired,
            'total_report'=>$reports->count(),
        ]);
    }
    public function isAdmin(){
        if (Auth::Check() && Auth::User()->role_id == 1){
           return response()->json([ "Bạn là admin"]);
        }
        else
            return response()->json([ "Bạn không phải admin"]);
    }

    public function getReport(){
        $reports = Report::all()->count();
        $post = Post::all();
        return response()->json([
            'posts'=>$post,
            'reports' => $reports
        ]);
    }

    public function getListUser(){
        $users = User::all();
        return response()->json(['users'=>$users]);
    }
    /* Motel room */
    public function getListPost(){
        $post = Post::all();
        return response()->json(['post'=>$post]);
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

    //Hủy phê duyệt

    public function unapprovalPost($id)
    {
        if (Auth::Check() && Auth::User()->role_id == 1) {
            $post = Post::find($id);
            $post->status_review = 0;
            $post->time_display = Carbon::now('Asia/Ho_Chi_Minh')->addDays($post->number_date);
            $post->save();
            $payment = $post->payments()->orderBy('id', 'DESC')->first();
            $payment->status = 0;
            $payment->save();
            return response()->json([
                'message' => 'Bỏ phê duyệt bài viết thành công!'
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

    public function DelPost($id){
        $post = Post::find($id);
        $post->delete();
        return response()->json(['thongbao','Đã xóa bài đăng']);
    }
    public function DelBoading($id){
        $boading= Boading::find($id);
        $boading->delete();
        return response()->json(['thongbao','Đã xóa nhà trọ']);
    }

    /* user */

    public function postUpdateUser(Request $request,$id){
        $user = User::find($id);
        $address = Address::find($user->address_id);
        $address->storeAddress($request);
        $user->firstname=$request->firstname;
        $user->lastname=$request->lastname;
        $user->email=$request->email;
        $user->phone_number=$request->phone_number;
        $user->address_id=$address->id;
        $this->cmnd=$request->cmnd;
        if($user->role == "owner")
        {
            $user->role_id=2;
        }
        else{
            $user->role_id=3;
        }

        $user->save();

       return response()->json(['thongbao','Chỉnh sửa thành công tài khoản '.$request->username.' .']);
    }

    public function DeleteUser($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['Đã xóa người dùng khỏi danh sách. Những bài đăng của người dùng này cũng bị xóa']);
    }
    /**
     * Hiển thị Phê duyệt chủ nhà trọ
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approvalUser($id)
    {
        if (Auth::Check() && Auth::User()->role_id == 1){
            $user = User::find($id);
            $user->status = 1;
            $user->save();
            return response()->json([
                'message' => 'Phê duyệt người dùng thành công!'
            ], 201);

        }
        else{
            return response()->json([
                'message' => 'Bạn không có quyền phê duyệt!',

            ], 201);
        }
    }
    /**
     * Hủy Phê duyệt chủ nhà trọ
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unapprovalUser($id)
    {
        if (Auth::Check() && Auth::User()->role_id == 1){
            $user = User::find($id);
            $user->status = 1;
            $user->save();
            return response()->json([
                'message' => 'Phê duyệt người dùng thành công!'
            ], 201);

        }
        else{
            return response()->json([
                'message' => 'Bạn không có quyền phê duyệt!',

            ], 201);
        }
    }

    //Thống kê bài post theo ngày
    public function statisticalDay($post_id,Request $request){
        $post = Post::find($post_id);
        $sum_like = LikePost::where('post_id',$post_id)->get()->count();
        $sum_view = SeenPost::where('post_id',$post_id)->get()->count();

        return response()->json([
            'post' => $post,
            'sum_like' =>$sum_like,
            'sum_view' => $sum_view
        ]);
    }
    //Thống kê bài post theo tháng
    public function statisticalMonth($post_id){
        $post = Post::find(1);

        $sum = visits($post)->count();
        return response()->json($sum);
    }
    //Lấy post gần đây
    public function getRecentPosts(){
        $response=[];
        $posts = Post::all()->sortByDesc('id');
        foreach($posts as $post){
            $arr_post = [];
            $user_post = User::find($post->user_id);
            $user_name= $user_post->firstname.' '.$user_post->lastname;
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
            $arr_post['status_review'] = $post->status_review;
            $seen_post_count = DB::table('seen_posts')
                ->select(DB::raw('SUM(count) as total_seens'))
                ->where('post_id', $post->id)
                ->groupBy('post_id')
                ->get();
            $arr_post['seen_post'] = $seen_post_count;
            $response[]= $arr_post;
        }
        return response()->json([
            $response
        ]);
    }

}
