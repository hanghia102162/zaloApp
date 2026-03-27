<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRegisterRequest;
use App\Http\Requests\updateUserRequest;
use App\Http\Requests\UploadAvatarRequest;
use App\Mail\welcomail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

use function Pest\Laravel\json;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials  = $request->only('email','password');
        if (Auth::attempt($credentials)){
            $user = Auth::user();
            return response()->json([
                'status' => true,
                'user' => $user
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Login failed'
        ]);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return Response()->json([
            'message'=>'LogOut Fisnish!'
        ]);
    }
    public function postRegister(PostRegisterRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json([
            'status'=> true,
            'Message'=>'register complete!'
        ]);
    }
    public function checkEmail(Request $request){
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response()->json([
                'status' =>false,
                'message' => 'email khong ton tai'
            ]);
        }

        $otp = rand(100000,999999);
        $user->otp = $otp;
        $user->otp_expired_at = now()->addMinutes(5);
        $user->save();
        session(['otp'=>$otp]); 
        // lưu mã otp vao email 
        session(['email'=>$request->email]);
        Mail::to($request->email)->send(new welcomail($otp));
        return response()->json([
            'status'=>true,
            'id'=>$user->id
        ]);
    }
    public function updatepassword(Request $request){
        $user = User::where('id',$request->id)->first();
        if($request->otp == $user->otp ){
            $user->password = Hash::make($request->password);
            $user->otp = null;
            $user->save();  

            return response()->json([
            'status' => true,
            'message'=>"doi mat khau thanh cong"
        ]);
        }
        return response()->json([
            'status' => false,
            'message'=> "opt sai !"
        ]);
    }



    public function profileReturn($id){
    $user = User::find($id);

    return response()->json([
        'user' => $user
    ]);}

    public function handleImage(UploadAvatarRequest $request,$id){
    if($request->hasFile('avatar')){
        $file = $request->file('avatar');
        // tao ten file 
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $user = User::findOrFail($id);
        if($request->type === 'avatar'){
        // luu vao public/storage
        $user->avatar = $fileName;
        $file->storeAs('avatars', $fileName, 'public');
        }
        if($request->type ==='avatarCover'){
            $user->avatarCover = $fileName;
            $file->storeAs('avatars',$fileName,'public');
        }
        $user->save();
        return response()->json([
            'message' => 'Upload thành công',
            'file' => $fileName
        ]);

    }
    return response()->json(['error' => 'Không có file'], 400);
    }

    public function updateUser(updateUserRequest $request,$id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->save();
        return response()->json([
            'message'=>'hoan thanh',
            'status'=>'ok',
            'user' => $user
        ]);
    }

}
