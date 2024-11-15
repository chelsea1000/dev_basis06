<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スペイン·フットボール</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net"> 
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        
    </head>
    <body class="antialiased">
        <h1>スペイン·フットボール</h1>
            <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h5>タイトル</h5>
                    <input type="text" name="post[title]" placeholder="タイトル">
            </div>
            <div>
                <h5>チーム名</h5>
                    <select name="post[team_id]">
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->name }}</option>
                        @endforeach
                </select>
            </div>
            <div class="body">
                <h5>本文</h5>
                    <textarea name="post[body]"placeholder="試合内容"></textarea>
            </div>
                <input type="submit" value="投稿">
        </form>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
    </body>
</html>
