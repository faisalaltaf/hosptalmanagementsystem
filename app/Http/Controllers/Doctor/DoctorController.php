<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RequestStack;

class DoctorController extends Controller
{
    //

    function  create(Request $request){
        $request->validate([
 'name'=>'required',
 'hospital'=>'required|unique:doctors',
 'email'=>'required|email|unique:doctors,email',
 'phone' => 'required|unique:doctors' ,
 'password'=> 'required | min:5|max:20',
 'cpassword'=>'required |min:5|max:20|same:password',

        ]);
    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = \Hash::make($request->password);
    //   //   $user->cpassword = \Hash::make($request->cpassword);
    //     $save = $user->save();

    $doctor =new Doctor();
    $doctor->name = $request->name;
    $doctor->hospital = $request->hospital;
    $doctor->email =$request->email;
    $doctor->phone = $request->phone;
    $doctor->password = \Hash::make($request->password);
    // $doctor->cpassword =\Hash::make($request->cpassword);
$save= $doctor->save();
if($save){
    return redirect()->back()->with('success','you are now  register successfuly');
}else
return redirect()->back()->with('fail','correct data insert'); 
}

function check(Request $request){
    $request->validate([
        'email'=>"required|email|exists:doctors,email",
        'password'=>"required|min:4|max:20",

    ],[
        'email.exists'=>'this is email not exit doctor table',

    ]);

    $creds = $request->only('email','password');
    if(Auth::guard('doctor')->attempt($creds)){
        return redirect()->route('doctor.home');
    }else{
        return redirect()->route('doctor.login')->with('fail','password correct');
    }
}


function logout(Request $request){
    Auth::guard('doctor')->logout();
    return redirect('doctor/login');
}



}
