<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class StaticsController extends Controller
{
    public function index() {

        $user_ids = User::all()->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $user_ids)->with('user')->orderBy('created_at', 'desc')->paginate(10);

        // dd($posts);

        return view('pages.index', compact('posts'));
    }
}
