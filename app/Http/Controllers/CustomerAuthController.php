<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAuthController extends Controller
{
    //
     // ฟังก์ชันการ Login
     public function login(Request $request)
     {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required',
         ]);
 
         $credentials = $request->only('email', 'password');
 
         if (Auth::guard('customer')->attempt($credentials)) {
             // ล็อกอินสำเร็จ
             return redirect()->intended('/');
         }
 
         // ล็อกอินไม่สำเร็จ
         return back()->withErrors(['email' => 'The email or password is incorrect.'])->withInput();
     }
}
