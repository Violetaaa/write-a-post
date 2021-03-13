<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }
    
    public function index()
    {
        // $posts = Post::get(); //Esto devuelve una colección de objetos que podremos iterar
        // $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts = Post::latest()->get();
        // $posts = Post::latest()->paginate(5); // PARA PAGINAR!!!!
        $posts = Post::with('user')->latest()->paginate(10); // CON EAGER LOADING!!!

        return view('posts.index', [
            'posts' => $posts
            // 'posts' => collect() // devuelve coleccion vacio. sirve para test
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        // dd('passed');

        $request->user()->posts()->create($request->only('body'));

        return back();
    }
    // public function destroy($id){
    //     // dd('delete', $id);
    //     //opción 1
    //     // $post = Post::where('id', '=', $id)->first();
    //     //opción 2, mejor
    //     $post = Post::find($id);
    //     $post->delete();
    //     return back();
    //     dd($post);
    // }

    public function destroy(Request $request, Post $post){

        // if(!$post->ownedBy($request->user)){
        //    return response(null, 401);
        //mejor esto, si el usuario no puede borrar el post
        // return new AuthorizationException();
        // }
        $this->authorize('delete', $post);

        $post->delete();
        return back();
    }
}
