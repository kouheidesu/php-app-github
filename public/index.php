<?php
// データベース接続設定
$host = "localhost";
$user = "root"; // 自分のDBユーザー名
$pass = ""; // DBのパスワード
$dbname = "todo_app";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("データベース接続失敗: " . $conn->connect_error);
}

// タスク追加
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['task'])) {
    $task = $conn->real_escape_string($_POST['task']);
    $sql = "INSERT INTO todos (task) VALUES ('$task')";
    $conn->query($sql);
    header("Location: index.php");
    exit();
}

// タスク削除
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM todos WHERE id = $id");
    header("Location: index.php");
    exit();
}

// タスク完了・未完了の切り替え
if (isset($_GET['complete'])) {
    $id = intval($_GET['complete']);
    $conn->query("UPDATE todos SET completed = NOT completed WHERE id = $id");
    header("Location: index.php");
    exit();
}

// タスクリスト取得
$result = $conn->query("SELECT * FROM todos ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 20px auto;
            text-align: center;
        }

        h1 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 8px;
            width: 70%;
        }

        button {
            padding: 8px 15px;
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #f4f4f4;
            padding: 10px;
            margin: 5px 0;
        }

        .completed {
            text-decoration: line-through;
            color: gray;
        }

        .delete {
            background: red;
            border: none;
            color: white;
            padding: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h1>ToDoリスト</h1>

    <!-- タスク追加フォーム -->
    <form action="index.php" method="POST">
        <input type="text" name="task" required placeholder="新しいタスクを入力">
        <button type="submit">追加</button>
    </form>

    <!-- タスクリスト表示 -->
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <span class="<?= $row['completed'] ? 'completed' : '' ?>">
                    <?= htmlspecialchars($row['task']) ?>
                </span>
                <div>
                    <a href="?complete=<?= $row['id'] ?>">
                        <button><?= $row['completed'] ? "未完了" : "完了" ?></button>
                    </a>
                    <a href="?delete=<?= $row['id'] ?>">
                        <button class="delete">削除</button>
                    </a>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>

</body>

</html>

<?php $conn->close(); ?>




<!-- // use Illuminate\Foundation\Application;
// use Illuminate\Http\Request;

// define('LARAVEL_START', microtime(true));

// // Determine if the application is in maintenance mode...
// if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
// require $maintenance;
// }

// // Register the Composer autoloader...
// require __DIR__ . '/../vendor/autoload.php';

// // Bootstrap Laravel and handle the request...
// /** @var Application $app */
// $app = require_once __DIR__ . '/../bootstrap/app.php';

// $app->handleRequest(Request::capture()); -->
