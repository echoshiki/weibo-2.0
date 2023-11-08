<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StaticsController extends Controller
{
    public function index() {

        $posts = [];
        if (Auth::check()) {
            /** @var App\Models\User $user */
            $user = Auth::user();
            $posts = $user->feed()->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $ids = User::all()->pluck('id')->toArray();
            $posts = Post::whereIn('user_id', $ids)->with('user')->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('pages.index', compact('posts'));
    }

    public function mall() {
        $users = User::all();
        $ids = $users->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->with('user')->orderBy('created_at', 'desc')->paginate(30);
        return view('pages.mall', compact('posts'));
    }
}
