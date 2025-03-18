<?php

// 外部コード読み込み
require __DIR__ . '/../vendor/autoload.php';
// インスタンス作成
$app = require_once __DIR__ . '/../bootstrap/app.php';

// ローカルでアプリを使用したい場合以下をコメントアウト解除
// use Illuminate\Contracts\Http\Kernel;
// use Illuminate\Http\Request;

// $kernel = $app->make(Kernel::class);

// $response = $kernel->handle(
//     $request = Request::capture()
// );

// ローカルサーバーでDB情報を使用したい場合
// $dsn = config('custom.dsn');
// $user = config('custom.username');
// $pass = trim(config('custom.password'));

// railwayで環境変数を使用する場合
// $dsn = env('MY_CUSTOM_DSN');
// $user = env('DB_USERNAME');
// $pass = env('DB_PASSWORD');


// Kernelインターフェース使用
use Illuminate\Contracts\Http\Kernel;
// Requestオブジェクト使用
use Illuminate\Http\Request;

print("hello world");

// $kernel = $app->make(Kernel::class);
// $response = $kernel->handle(Request::capture())->send();
// $kernel->terminate(Request::capture(), $response);

$request = Request::capture();
$response = $kernel->handle($request)->send();
$kernel->terminate($request, $response);
