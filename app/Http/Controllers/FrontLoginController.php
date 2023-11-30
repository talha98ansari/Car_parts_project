<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class FrontLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    protected function login(Request $request)
    {
        $validate = $this->validator($request->all());
        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate->errors());
        }
        $user = User::where('email', $request->email)->where('role_id',3)->where('is_active' , 1 )->first();
        if ($user != null) {
            if (!Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid Credentials');
            } else {
                if ($this->attemptLogin($request)) {
                    return redirect('/');
                }
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'User not found');
        }
    }
    protected function Vendorlogin(Request $request)
    {
        $validate = $this->validator($request->all());
        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate->errors());
        }
        $user = User::where('email', $request->email)->where('role_id',2)->where('is_active' , 1)->first();
        if ($user != null) {
            if (!Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                return redirect()
                    ->back()
                    ->with('error', 'Invalid Credentials');
            } else {
                if ($this->attemptLogin($request)) {
                    return redirect('/');
                }
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'User not found');
        }
    }
}
