<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\posts;

class PostController extends Controller
{
    public function index() {
        
        $posts = DB::table('posts')->select('title','content')->get();
        return view('posts.index', compact('posts'));
    }
        public function show($id) {
            $post = posts::find($id);
            return view('posts.show', compact('post'));
        }
}
