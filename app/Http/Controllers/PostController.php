<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Postモデルを通じて、postsテーブルのデータを全て取得
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        // user_id情報を追加
        $validated['user_id'] = auth()->id();
        // **Postとは静的メソッドでなく、Eloquentモデルに組み込まれた「静的風API」**です
        $post = Post::create($validated);

        // falshだとVScodeの補完エラーが出るのでwithを使用
        // $request->session()->flash('message', '保存しました');
        // return redirect()->route('create'); // ← 明示的に
        return redirect()->route('post.index')->with('message', '保存しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // 依存注入を使用して、Postモデルのインスタンスを取得
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required|max:400',
        ]);

        // user_id情報を追加
        $validated['user_id'] = auth()->id();
        $post->update($validated);

        // flashだとVScodeの補完エラーが出るのでwithを使用
        // $request->session()->flash('message', '保存しました');
        // return redirect()->route('create'); // ← 明示的に
        return redirect()->route('post.show', compact('post'))->with('message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message', '削除しました');
    }
}
