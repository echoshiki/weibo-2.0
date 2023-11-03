<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct() {
        $this->middleware('guest',[
            'only' => ['create', 'store']
        ]);
    }

    public function create() {
        return view('sessions.create');
    }

    public function store(Request $request) {
        $user = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        if (Auth::attempt($user, $request->has('remember'))) {
            if (Auth::user()->email_verified_at) {
                # 返回登陆前的页面
                session()->flash('success', '你好 '.Auth::user()->name.'，欢迎回来！');
                $fallback = route('users.show', [Auth::user()]);
                return redirect()->intended($fallback);
            } else {
                Auth::logout();
                session()->flash('danger', '您的账户尚未激活，请尽快前往邮箱激活账户！');
                return redirect()->back()->withInput();
            }
        } else {
            session()->flash('danger', '您的账户和密码不匹配，请重试！');
            return redirect()->back()->withInput();
        }
    }

    public function destroy() {
        Auth::logout();
        session()->flash('success', '退出成功，下次再来！');
        return redirect()->route('login');
    }
}
