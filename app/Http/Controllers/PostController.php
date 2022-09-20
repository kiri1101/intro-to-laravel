<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        return view('post',[
            'posts' => Post::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'comments' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect('post')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        $validate = $validator->validated();
    
        Post::create($validate);
        return back();
    }
}
