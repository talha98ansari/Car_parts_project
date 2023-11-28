<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Hash;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    public function password(Request $request)
    {
        $postData = $request->all();
        /*dd($password);*/
        $password = $postData['current-password'];
        $admin = User::where('email', auth()->user()->email)->first();
        $hashpwd = $admin['password'];
        if (Hash::check($password, $hashpwd)) {
            //            dd($password=$postData['new_pwd']);
            if ($request->has('new-password') && $request->get('new-password', '') != '') {
                $postData['new-password'] = Hash::make($postData['new-password']);
                $newpwd = $postData['new-password'];
                User::where('email', auth()->user()->email)
                    ->first()
                    ->update(['password' => $newpwd]);
                    return redirect()
                ->back()
                ->with('success', 'Password Changed Successfully');
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'Incorrect Old Password');
        }
    }
    public function passwordView(){
        return view('auth.changePass');

    }

}
