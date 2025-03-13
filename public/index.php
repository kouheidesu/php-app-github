<?php
// データベース接続設定
$host = "yamanote.proxy.rlwy.net";
$user = "root"; // 自分のDBユーザー名
$pass = "XTMCRVDQMIHTkFffrZOJgYSwUyWFlAPi"; // DBのパスワード
$db = "railway";
$port = 35586; // Railwayのポート番号
$dsn = "mysql://root:XTMCRVDQMIHTkFffrZOJgYSwUyWFlAPi@yamanote.proxy.rlwy.net:35586/railway";

// DB接続
try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    exit('DB接続エラー: ' . $e->getMessage());
}

// 投稿処理
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $message = htmlspecialchars($_POST["message"]);
    if ($name && $message) {
        $stmt = $pdo->prepare("INSERT INTO posts (name, message, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$name, $message]);
    }
}

// 投稿一覧取得
$stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>投稿アプリ</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f0f0f0;
            padding: 2rem;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-bottom: 2rem;
        }

        input,
        textarea {
            width: 100%;
            padding: 0.8rem;
            margin-top: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 1rem;
            padding: 0.7rem 1.5rem;
            background: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .post {
            border-bottom: 1px solid #ddd;
            padding: 1rem 0;
        }

        .post:last-child {
            border-bottom: none;
        }

        .post .name {
            font-weight: bold;
        }

        .post .date {
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>投稿フォーム</h2>
        <form method="POST">
            <label>名前：</label>
            <input type="text" name="name" required>
            <label>メッセージ：</label>
            <textarea name="message" rows="4" required></textarea>
            <button type="submit">投稿</button>
        </form>

        <h3>投稿一覧</h3>
        <div id="posts">
            <?php foreach ($posts as $post): ?>
                <div class="post">
                    <div class="name"><?= htmlspecialchars($post['name']) ?></div>
                    <div class="date"><?= $post['created_at'] ?></div>
                    <div class="message"><?= nl2br(htmlspecialchars($post['message'])) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        // 必要に応じてJSを追加できます（例：バリデーション、動的更新など）
    </script>
</body>

</html>
