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
        return view('requests.create');
    }

    public function store(Request $request) {
        // HTTPリクエストに含まれる、単一のパラメータの値を取得する
        $title = $request->input('title');
        $content = $request->input('content');

        // HTTPリクエストメソッド(GET,POST,PUT,PATCH,DELETE)を取得する
        $method = $request->method();

        // HTTPリクエストのパスを取得する
        $path = $request->path();

        // HTTPリクエストのURLを取得する
        $url = $request->url();

        // HTTPリクエストを送信したクライアントのIPアドレスを取得する
        $ip = $request->ip();

        $variables = [
            'title',
            'content'
        ];

        return view('requests.confirm', compact($variables));
    }
}
