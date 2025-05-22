<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function login(LoginRequest $request){
     if(auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
       return redirect()->route('sanksi.index');
     }else{
       return redirect()->back()->withErrors(['login' => 'Error bang wadaw']);
     }
   }
}