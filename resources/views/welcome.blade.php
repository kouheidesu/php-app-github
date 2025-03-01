<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Laravel Page</title>
    <style>
        /* おしゃれなデザインのためのCSS */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        button {
            background-color: #ff7eb3;
            border: none;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        button:hover {
            background-color: #ff3d75;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to My Laravel Page</h1>
        <p>おしゃれなデザインの Laravel Webページへようこそ！</p>
        <button onclick="showMessage()">Click Me!</button>
    </div>

    <script>
        function showMessage() {
            alert('Laravel + HTML + CSS + JS の組み合わせで、おしゃれなWebページが完成しました！🎉');
        }
    </script>
</body>

</html>
