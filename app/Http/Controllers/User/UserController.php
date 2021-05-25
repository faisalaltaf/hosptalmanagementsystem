<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    function create(Request $request){
      $request->validate([
          'name'=>'required',
          'email'=>'required |email|unique:users,email',
          'password'=> 'required|min:5|max:20',
          'cpassword'=>'required|min:5|max:20|same:password'
      ]);

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = \Hash::make($request->password);
    //   $user->cpassword = \Hash::make($request->cpassword);
      $save = $user->save();

      if($save ){
return redirect()->back()->with('success','you are now  register successfuly');

      }else{
return redirect()->back()->with('fail', 'you are correct details');
      }
    }


    
    function check(Request $request){
$request->validate([
    'email'=> 'required|email|exists:users,email',
    'password'=> 'required |min:5|max:20|',
],[
  'email.exists'=>'this is email not exit on  table',
]);
$creds =  $request ->only('email','password');
if(Auth::guard('web')->attempt($creds) ){
  return redirect()->route('user.home');
}else{
  return redirect()->route('user.login')->with('fail','incorrect credentials');
}
    }
function logout(){
  Auth::guard('web')->logout();
  return redirect('/');

}
    

}
