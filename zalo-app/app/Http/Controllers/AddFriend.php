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
            FriendRequest::created([
                'sender_id'=>'$id',
                'receiver_id'=>'receiverId',
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
}
