<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        return 'PostControllerのindexは動いています';
        // $posts = DB::table('user_table')->orderBy('created_at', 'desc')->get();
        // return view('posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'task' => 'required|string',
        ]);

        DB::table('user_table')->insert([
            'name' => $request->name,
            'task' => $request->task,
            'completed' => 0,
            'created_at' => now(),
        ]);

        return redirect('/');
    }
}
