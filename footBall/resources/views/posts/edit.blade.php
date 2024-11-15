<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スペイン·フットボール</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net"> 
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
    </head>
    <body class="antialiased">
        <h1>スペイン·フットボール</h1>
            <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="title">
                <h5>タイトル</h5>
                    <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title', $post->title) }}">
                    <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div>
                <h5>チーム名</h5>
                    <select name="post[team_id]">
                        @foreach($teams as $team)
                    <option value="{{ $team->id }}" {{ $team->id == $post->team_id ? 'selected' : '' }}>{{ $team->name }}</option>
                        @endforeach
                </select>
            </div>
            <div class="body">
                <h5>本文</h5>
                    <textarea name="post[body]"placeholder="試合内容">{{ old('post.body', $post->body )}}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
                <input type="submit" value="投稿">
        </form>
        <div class="footer">
            <a href="/posts/{{ $post->id }}">戻る</a>
        </div>
    </body>
</html>
