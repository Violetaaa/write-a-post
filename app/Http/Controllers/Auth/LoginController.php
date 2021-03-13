<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request) {
         
        //  dd($request->remember);

        //validate input
         $this->validate($request, [
            'email' => 'required|email', //email único en la tabla usuarios en la columna email
            'password' => 'required'
        ]);

        //check
        //$request->remember ==>> se añade esto como segundo argumento para recordar usuario
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            // dd('fails');
            return back()->with('status', 'Invalid login details');
        }
        
        //en un mismo método, redireccionamos a donde el usuario que ir, o si no lo indicó, a la home
        return redirect()->intended('/');
    }
}
