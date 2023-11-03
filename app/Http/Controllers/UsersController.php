<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('guest',[
            'only' => ['create', 'store']
        ]);
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $this->sendEmailConfirmationTo($user);
        
        session()->flash('notice', '注册成功！但是你需要尽快去邮箱激活账户后才能使用！');
        return redirect()->route('login');
        
    }

    public function sendEmailConfirmationTo(User $user) {
        $view = 'emails.confirm';
        $data = compact('user');
        $to = $user->email;
        $subject = "感谢加入我们!请确认你的邮箱。";
        Mail::send($view, $data, function($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        }); 
    }

    public function confirmEmail(Request $request) {
        $user = User::where('activation_token', $request->token)->firstOrFail();
        $user->email_verified_at = now();
        $user->activation_token = null;
        $user->save();

        Auth::login($user);
        session()->flash('success', '恭喜你，账户激活成功！');
        return redirect()->route('users.show', compact('user'));
    }

    public function show(User $user) {
        return view('users.show', compact('user'));
    }


        
}
