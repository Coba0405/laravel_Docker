<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 新規作成ページへ飛ばすコマンド
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // store 作られたものをデータベースに反映させる場所
    public function store(Request $request)
    {
        //現在認証しているユーザーを取得
        $id = Auth::id();
        // この記述だと現在認証しているユーザーの「ID」を取得
        // $user = Auth::id();

        // インスタンスの作成
        $post = new Post();
        
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $id;
        
        // saveで上の内容をデータベース（PostControllerのtable）に保存をする
        $post->save();
        // storeの時はredirectを使用する
        return redirect()->to('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $usr_id = $post->user_id;
        // userテーブルにアクセスしてる　sql文で取得
        $user = DB::table('users')->where('id', $usr_id)->first();

        return view('posts.detail',['post' => $post,'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // posttableにアクセスして($id)で対象を取得して$postに一度格納する
        $post = Post::findOrFail($id);
        
        // 上で取得した$postをviewで表示している
        return view('posts.edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $id = $request->post_id;
        // レコードを検索する
        // railsの @post = Post.find(params[:id])のようなイメージ
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        return redirect()->to('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post = \App\Post::findOrFail($id);
        $post->delete();

        return redirect()->to('/posts');
    }
}
