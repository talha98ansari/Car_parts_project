<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\BusinessInfo;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
class vendorRegistrationController extends Controller
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

    use RegistersUsers;

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
    public function registerationPageType(){
        return view('auth.vendor_accnt_type');

    }
    public function loginPage()
    {
        return view('auth.vendor_login');
    }
    public function registerationPage()
    {
        return view('auth.vendor_registration');
    }
    public function BusinessregisterationPage()
    {
        return view('auth.vendor_registration_business');
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
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     dd($data);
    //     return User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    // }
    protected function savevendor(Request $request)
    {
        $validate = $this->validator($request->all());
        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate->errors());
        }
        $business = BusinessInfo::create([

            'b_name' => $request->b_name,
            'niche' => $request->niche,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);
        $password = mt_rand(1e15, 1e16 - 1);
        $user = User::create([
            'business_id' => $business->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->p_phone,
            'vendor_type' => $request->vendor_type ?? 'business',
            'password' => Hash::make($password),
            'is_active' => 0,
            'role_id'=>2
        ]);
        return redirect()
                ->back()
                ->with('success', 'Account Created Successfully , You will recieve a confirmation Email shortly when account is activated!');

    }
    protected function savevendorNB(Request $request)
    {
        $validate = $this->validator($request->all());
        if ($validate->fails()) {
            return redirect()
                ->back()
                ->withErrors($validate->errors());
        }
        $password = mt_rand(1e15, 1e16 - 1);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'vendor_type' => $request->vendor_type ?? 'non_business',
            'password' => Hash::make($password),
            'is_active' => 0,
            'role_id'=>2
        ]);
        return redirect()
                ->back()
                ->with('success', 'Account Created Successfully , You will recieve a confirmation Email shortly when account is activated!');

    }
}
