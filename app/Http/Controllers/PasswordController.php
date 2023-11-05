<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function showFindForm() {
        return view('passwords.find');
    }

    public function sendLinkEmail(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|max:255'
        ]);
        $email = $request->email;
        $user = User::where(['email'=>$email])->first();

        if ($user) {   
            # 插入数据库     
            $token = hash_hmac('sha256', Str::random(20), config('app.key'));
            DB::table('password_reset_tokens')->updateOrInsert([
                'email' => $email
            ],[
                'email' => $email,
                'token' => Hash::make($token),
                'created_at' => new Carbon
            ]);

            # 发送邮件
            Mail::send('emails.password_reset', compact('token'), function($msg) use ($email) {
                $msg->to($email)->subject('找回密码');
            });

            session()->flash('success', '邮件发送成功，请去邮箱查收修改密码邮件！');
            return redirect()->route('login');
        }
        session()->flash('danger', '用户邮箱不存在。');
        return back();
    }

    public function showResetForm(Request $request) {
        $token = $request->token;
        return view('passwords.reset', compact('token'));
    }

    public function reset(Request $request) {
        $this->validate($request, [
            'token' => 'required',    
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6' 
        ]);

        $email = $request->email;
        $token = $request->token;
        $password = $request->password;

        $user = User::where(['email' => $request->email])->first();     
        if (!$user) {
            session()->flash('danger', '输入的邮箱不存在！');
            return redirect()->back();
        }

        $record = DB::table('password_reset_tokens')
                    ->where('email', $email)
                    ->first();
        if (!$record) {
            session()->flash('danger', '没有找到重置密码的申请记录。');
            return redirect()->back();
        }

        $expire_time = 60 * 100;
        if (Carbon::parse($record->created_at)->addSecond($expire_time)->isPast()) {
            session()->flash('danger', '重置链接已经过期，请返回重新操作。');
            return redirect()->back();
        }

        if (!Hash::check($token, $record->token)) {
            session()->flash('danger', '令牌错误！');
            return redirect()->back();
        }

        $user->password = bcrypt($password);
        $user->save();

        session()->flash('success', '恭喜你，密码重置成功，请用新密码登录。');
        return redirect()->route('login');
    }
}
