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

    public function create() {
        return view('posts.create');

    }

    // store アクションの追加 引数にRequest $requestの型宣言を行う。
    public function store(Request $request) {
        // $requestの情報をバリデーションにかける
        $request->validate([
            'title' => 'required|max:20',
            'content' => 'required|max:200'
        ]);

        $post = new posts();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('posts.index');
    }
}
