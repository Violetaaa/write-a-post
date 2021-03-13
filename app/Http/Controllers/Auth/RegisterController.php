<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function index() {
        return view('auth.register');
   }

   public function store(Request $request) {
    //validate input
    $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email', //email único en la tabla usuarios en la columna email
        'username' => 'required|unique:users,username',
        'password' => 'required|confirmed'
    ]);

    //create user
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'username' => $request->username,
        'password' => Hash::make($request->password),
    ]);

    //authenticate user con auth() o Auth::
    auth()->attempt($request->only('email', 'password')); //$request->only() devuelve un array con los datos aolicitados


    return redirect()->route('dashboard');
   }
}
