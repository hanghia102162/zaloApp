<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Mime\Message;

class AddFriend extends Controller
{
    public function searchFriend(Request $request,$id){
        $keyword = $request->input('keyword');
        $users = User::where('name', 'like', '%' . $keyword . '%')
        ->where('id', '!=', $id) // không tìm chính mình
        ->get();
        return response()->json($users);
    }
    public function AddFriend (Request $request,$id){
        $receiverId = $request->receiverId;
        if ($receiverId != $id){
            FriendRequest::create([
                'sender_id'=>$id,
                'receiver_id'=>$receiverId,
                'status'=>'pending'
            ]);
            return response()->json([
                'message'=>"Gửi lời mời hoàn tất"
            ]);
    
        }
        return response()->json([
            'Message'=>"thất bại"
        ]);
    }
    public function Sender($id){
        $requests = FriendRequest::with('sender')
                ->where('receiver_id',$id)
                ->get();
        $count = FriendRequest::where('receiver_id',$id)->count();
                return response()->json([
                    'data'=>$requests,
                    'count'=>$count]);
    }
    public function SendInvitations($id){
        $request = FriendRequest::with('receiver')
        ->where('sender_id',$id)
        ->get();
        $count = FriendRequest::where('sender_id',$id)->count();
        return response()->json([
        'data' => $request,
        'count'=>$count]);

    }
}
