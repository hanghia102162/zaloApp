<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\Friends;
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
                ->where('status','pending')
                ->get();
        $count = FriendRequest::where('receiver_id',$id)
                ->where('status','pending')        
                ->count();
                return response()->json([
                    'data'=>$requests,
                    'count'=>$count]);
                    // tra ve thong ng gui
    }
    // 
    public function SendInvitations($id){
        $request = FriendRequest::with('receiver')
        ->where('sender_id',$id)
        ->get();
        $count = FriendRequest::where('sender_id',$id)
        ->count();
        return response()->json([
        'data' => $request,
        'count'=>$count]);

    }
    public function revokeInvitat($id){
        $request = FriendRequest::findOrFail($id);

        $request->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Thu hồi lời mời thành công'
    ]);
    }
    // chap nhan ket ban
    public function Accepted($id){
        $request = FriendRequest::where('sender_id',$id);
        $sender = $request->sender_id;
        $receiver = $request->receiver_id;
        $request->update([
            'status'=>'accepted'
        ]);
        Friends::create([
            'user_id' => $sender,
            'friend_id'=> $receiver
        ]);
        Friends::create([
            'user_id' => $receiver,
            'friend_id'=> $sender
        ]);
        return response()->json([
            'Message'=>'ket ban thanh cong!'
        ]);
    }
    // khong chap nhan ket ban
    public function Rejected($id){
        $request = FriendRequest::findOrFail($id);
        $request->update([
            'status'=>'rejected'
        ]);
        return response()->json([
            'message'=>'ko chap nhan ket ban thanh cong!'
        ]);
    }
}
