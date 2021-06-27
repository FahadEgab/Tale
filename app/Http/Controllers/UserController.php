<?php

namespace App\Http\Controllers;

use App\Models\Tale;
use App\Models\User;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use UserTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(){
        $user = User::find(Auth::id());
      return view('User.show',compact('user'));
    }

    public function update(Request $request,$id){

      $user = User::find($id);

      $file_name = $this ->saveUserImg($request->photo,'photos');

      $user->update([
          'name'=>$request->name,
          'email'=>$request->email,
          'phone'=>$request->phone,
          'photo'=>$file_name,
          'gender'=>$request->gender,
      ]);

      return redirect()->back();
    }

    public function delete($id){
      User::destroy($id);
      return redirect() -> route('Tales.index');
    }
}
