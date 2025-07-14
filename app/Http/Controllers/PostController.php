<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;

use function PHPSTORM_META\map;

class PostController extends Controller
{
    //
    public function create() {
        return view('post.create');
    }

    public function store(Request $request) {
        Gate::authorize('test');
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);
    
        // user_id情報を追加
        $validated['user_id'] = auth() -> id();
        // **Postとは静的メソッドでなく、Eloquentモデルに組み込まれた「静的風API」**です
        $post =  Post::create($validated);

        // falshだとVScodeの補完エラーが出るのでwithを使用
        // $request->session()->flash('message', '保存しました');
        // return redirect()->route('create'); // ← 明示的に
        return redirect()->route('create')->with('message', '保存しました');
    }

    // Postモデルを通じて、postsテーブルのデータを全て取得
    public function index() {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }
}
