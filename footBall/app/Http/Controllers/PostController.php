<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Team;
use Illuminate\Database\Eloquent\Model;

class PostController extends Controller
{
    public function index(Post $post,Team $team) //Postsテーブルからデータを取得するためにPostクラス、チームステーブルからデータを取得するためにTeamクラスを呼び出す。
    //public function=メソッドを定義する際に使用される構文。index(Post $post)=indexというメソッドの名前でその引数としてPostモデルのインスタンスを自動的に受け取る。
    {
        $post_data = $post->getPaginateByLimit(10); //Postテーブルからすべてデータを持ってくる。
        $team_data = $team->get(); //チームステーブルからチームデータをすべて持ってくる。
        //view():カッコ内で指定したblade.phpのファイルを開く。カッコ内にはresorces/viewsフォルダの中のパスを書く
        return view('posts.index')->with(
            [
                'posts' => $post_data, //indexbladeに対してpostsという変数名で$post_dataの中身を渡す。
                'teams' => $team_data //indexbladeに対してteamsという変数名で$team_dataの中身を渡す。
            ]
        );
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
        //->with()はビューに変数を渡すためのもの。
    }
    
    public function create(Post $post,Team $team)
    {
        $post_data = $post->getPaginateByLimit(20); //Postテーブルからすべてデータを持ってくる。
        $team_data = $team->get(); //チームステーブルからチームデータをすべて持ってくる。
        //view():カッコ内で指定したcreate..phpのファイルを開く。カッコ内にはresorces/viewsフォルダの中のパスを書く
        return view('posts.create')->with(
            [
                'posts' => $post_data, //create.bladeに対してpostsという変数名で$post_dataの中身を渡す。
                'teams' => $team_data //create.bladeに対してteamsという変数名で$team_dataの中身を渡す。
            ]
        );
    }
    
    public function edit(Post $post,Team $team)
    {
        $post_data = $post->getPaginateByLimit(10); //Postテーブルからすべてデータを持ってくる。
        $team_data = $team->get(); //チームステーブルからチームデータをすべて持ってくる。
        return view('posts.edit')->with(
            [
                'posts' => $post_data, //indexbladeに対してpostsという変数名で$post_dataの中身を渡す。
                'teams' => $team_data //indexbladeに対してteamsという変数名で$team_dataの中身を渡す。
            ]
        );
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function store(Request $request, Team $team)
    //store=データをデータベースに追加するためのものを指す
    {
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'team_id' => 'required|integer',
            'body' => 'required|string',
        ]);
        
        $post = new Post ();
        $post->title = $validateData['title'];
        $post->team_id = $validateData['team_id'];
        $post->body = $validateData['body'];
        $post->user_id = auth()->id(); // 現在のユーザーのIDを設定
        $post->save();
        
        return redirect()->route('posts.index')->with('success', '投稿が保存されました。');
    }
    
    // PostController.php
    public function destroy(Post $post)
    {
        // 投稿を削除
        $post->delete();
        
        // 一覧ページにリダイレクト
        return redirect()->route('posts.index')->with('success', '投稿が削除されました。');
    }
    
    public function update(Request $request, Post $post)
    {
    // バリデーション（必要に応じて追加）
    $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ]);

    // 投稿を更新
    $post->update($request->only(['title', 'body']));

    // 投稿一覧ページにリダイレクト
    return redirect()->route('posts.index')->with('success', '投稿が更新されました');
    }
}
?>