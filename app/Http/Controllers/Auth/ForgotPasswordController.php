<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Reminder;
use App\User;
use Mail;
use Sentinel;

class ForgotPasswordController extends Controller {

    public function forgotPassword() {
        return view('sentinel.forgot_password');
    }

    public function postForgotPassword(Request $request) {
        $user = User::whereEmail($request->email)->first();
        $sentinelUser = Sentinel::findById($user->id);
        if (count($user) == 0) {
            return redirect()->back()->with('success', 'code da duoc gui vao email');
        }
        $reminder = Reminder::exists($sentinelUser) ?: Reminder::create($sentinelUser);
        $this->sendEmail($user, $reminder->code);
        return redirect()->back()->with('success', 'code da duoc gui vao email');
    }

    public function resetPassword($email, $code) {
        
        $user = User::where('email', '=', $email)->first();
         
        if (count($user) == 0) {
            abort(404);
        }
        //dd($user);
        $sentinelUser = Sentinel::findById($user->id);
        if ($reminder = Reminder::exists($sentinelUser)) {
            if ($code == $reminder->code) {
                return view('sentinel.reset_password');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
        return $user;
    }

    public function postResetPassword(Request $request, $email, $code) {
        $user = User::where('email', '=', $email)->first();
        
        if (count($user) == 0) {
            abort(404);
        }
        $sentinelUser = Sentinel::findById($user->id);
        if ($reminder = Reminder::exists($sentinelUser)) {
            if ($code == $reminder->code) {
                Reminder::complete($sentinelUser, $code, $request->password);
                return redirect('/login')->with([
                    'success',
                    'dang nhap voi mat khau moi'
                ]);
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
        }
    }

    private function sendEmail($user, $code) {
        /*
         * Mail::send('emails.forgot-password',[
         * 'user'=>$user,
         * 'code'=>$code
         * ], function($message) use ($user){
         * $message->to($user->email);
         * $message->subject(["hello $user->first_name, reset your password."]);
         * });
         */
        Mail::send('sentinel.emails.forgot-password', [
            'user' => $user,
            'code' => $code
        ], function ($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Reset mat khau');
            $message->from('dovanhungcis@gmail.com', 'Portgas D. Ace');
        });
    }
}
