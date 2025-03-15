<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>投稿アプリ</title>
    <style>
        /* スタイルはそのまま流用でOK */
    </style>
</head>

<body>
    <div class="container">
        <h2>投稿フォーム</h2>
        <form method="POST" action="/">
            @csrf
            <label>名前：</label>
            <input type="text" name="name" required>
            <label>タスク：</label>
            <textarea name="task" rows="4" required></textarea>
            <button type="submit">投稿</button>
        </form>

        <h3>投稿一覧</h3>
        @foreach($posts as $post)
        <div class="post">
            <div class="name">{{ $post->name }}</div>
            <div class="date">{{ $post->created_at }}</div>
            <div class="message">{{ nl2br(e($post->task)) }}</div>
        </div>
        @endforeach
    </div>
</body>

</html>
