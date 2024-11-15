<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スペイン·フットボール</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net"> 
        {{--<link rel>=リソースとの関係を示すもの。今回はrel属性にpreconnectを指定している。--}}
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- <link href>=リンク先のURLを示すもの。--}}
    </head>    
    <style>
            /* ベースのスタイル */
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f0f8ff;
                color: #333;
                margin: 0;
                padding: 0;
            }

            .content {
                width: 100%;
                max-width: 800px;
                margin: 30px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            }
            
            .post-info {
                font-size: 16px;
                color: #555;
                margin-bottom:20px;
                font-weight: 600;
            }

            /* フォームのスタイル */
            form {
                display: flex;
                flex-direction: column;
            }

            input[type="text"],
            textarea {
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                width: 100%;
                box-sizing: border-box;
                transition: border-color 0.3s;
            }
            
            input[type="text"]:focus,
            textarea:focus {
               border-color: #888; 
            }
            
            textarea {
                resize: vertical;
                height: 150px;
            }

            .form-group {
                display: flex;
                flex-direction: column;
                margin-bottom: 20px;
            }

            /* ボタンの共通スタイル */
            .btn {
                padding: 2px 6px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s color 0.3s;
                display: inline-block;
                background-color: #f4f4f4;
                color: #333;
                text-decoration: none;
                text-align:center;
            }

            .btn:hover {
                background-color: #ddd; /* ホバー時の色 */
            }
            
            .btn-group {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-top: 20px;
            }
            
            .left-buttons {
                display: flex;
                gap: 10px;
                justify-content: flex-start;
            }
            
            .right-buttons {
               display: flex;
                gap: 10px;
                justify-content: flex-end; 
            }

        </style>
        
    </head>
    <body class="antialiased">
        <div class='content'>
            <div class='content_post'>
                <form action="{{ route('posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <div class="post-info">
                        投稿者: {{ Auth::user()->name }} | チーム: {{ $post->team->name }}
                    </div>    
                
                    <!-- タイトルの入力フィールド -->
                    <div class="form-group">
                        <label for="title">タイトル</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                    </div>
                
                    <!-- 本文の入力フィールド -->
                    <div class="form-group">
                        <label for="body">本文</label>
                        <textarea id="body" name="body" required>{{ old('body', $post->body) }}</textarea>
                    </div>
                
                    <!-- ボタンエリア -->
                    <div class="btn-group">
                        <div class="left-buttons">
                            <a href="/" class="btn">戻る</a>
                    </div>
                    <div class="right-buttons">
                        <button type="submit" class="btn">更新</button>
                </form>
            
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" onclick="return confirm('本当に削除しますか？削除したデータは復元できません。')">削除</button>
                </form>
            </div>
        </div>
    </body>
</html>