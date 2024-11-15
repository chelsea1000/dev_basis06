<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>スペイン·フットボール</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        /* ベースのスタイル */
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 35px;
            color: #ff4500;
            text-decoration: underline;
            font-style: italic;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-top: 20px;
        }

        h3 {
            font-size: 20px;
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 20px;
        }

        h5 {
            font-size: 16px;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .content {
            width: 100%;
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .post-container {
            width: 100%; /* 幅を90%に設定して広げる */
            max-width: 1000px; /* 必要に応じて最大幅を設定 */
            margin: 15px auto; /* 上下に余白を取り、中央揃えにする */
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            background-color: #f9f9f9;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        .post-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            text-decoration: underline;
        }
        
        .post-body {
            font-size: 15px;
            color: #333;
            margin-bottom: 10px;
        }

        /* フォームのスタイル */
        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .title-input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 15px;
            transition: border-color 0.3s;
        }
        
        .team-select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 50%;
            box-sizing: border-box;
            margin-bottom: 15px;
            transition: border-color 0.3s;
        }
        .body-area {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 15px;
            transition: border-color 0.3s;
        }

        .title-input:focus,
        .team-select:focus,
        .body-area:focus {
            border-color: #888;
        }

        .body-area {
            height: 150px;
            resize: vertical;
        }

        /* ボタンの共通スタイル */
        .btn,
        input[type="submit"],
        .detail-button {
            background-color: #f4f4f4;
            padding: 2px 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s, transform 0.15s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
            text-align: center;
        }

        .btn:hover,
        input[type="submit"]:hover,
        .detail-button:hover {
            background-color: #ddd;
            transform: scale(1.05);
        }

        /* ボタンの配置用 */
        .button-container {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }

        .center-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 1px;
        }
        
        /* 区切り線のデザイン */
        .separator {
            border: 0;
            border-top: 2px solid #ccc; /* 色と太さを設定 */
            margin: 20px 0; /* 上下の余白を調整 */
            width: 100%; /* 横幅を100%に設定 */
        }

    </style>
    
</head>
<body class="antialiased">
    <div class="content">
        <h1>スペイン·フットボール🇪🇸</h1>
        <h3>ブログ投稿フォーム</h3>

        <!-- 投稿フォーム -->
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <h5>タイトル</h5>
            <input type="text" name="title" class="title-input" required>

            <h5>チーム名</h5>
            <select name="team_id" class="team-select" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>

            <h5>本文</h5>
            <textarea name="body" class="body-area" required></textarea>

            <div class="button-container">
                <input type="submit" value="投稿" class="btn">
            </div>
        </form>
        
        <hr class="separator">
        
        <!-- 投稿の表示 -->
        <div class="center-content">
            @foreach($posts as $post)
                <div class="post-container">
                    <p class="post-title">{{ $post->title }}</p>    
                    <p class="post-body">{!! nl2br(e( $post->body)) !!}</p>
                    <a href="/posts/{{ $post->id }}" class="detail-button">詳細画面</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
