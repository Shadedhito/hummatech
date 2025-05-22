<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request) {
        User::query()->create($request->validated());
        return redirect()->back()->with('success', 'Berhasil melakukan registrasi');
    }
}