@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-6 mt-6">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">投稿フォーム</h2>

    <form method="POST" action="/" class="space-y-4 mb-10">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">名前：</label>
            <input type="text" name="name" required
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">タスク：</label>
            <textarea name="task" rows="4" required
                class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
            投稿
        </button>
    </form>

    <h3 class="text-xl font-semibold text-gray-800 mb-4">投稿一覧</h3>

    @foreach($posts as $post)
    <div class="mb-4 p-4 bg-gray-50 border border-gray-200 rounded-lg shadow-sm">
        <div class="text-gray-900 font-bold">{{ $post->name }}</div>
        <div class="text-sm text-gray-500">{{ $post->created_at }}</div>
        <div class="text-gray-700 whitespace-pre-line mt-2">{!! nl2br(e($post->task)) !!}</div>
    </div>
    @endforeach
</div>
@endsection