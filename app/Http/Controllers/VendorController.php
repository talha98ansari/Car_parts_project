<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BusinessInfo;
use Illuminate\Support\Str;
use Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', 2)->get();
        return view('backend.vendors.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = '';
        $business = BusinessInfo::create([

            'b_name' => $request->b_name,
            'niche' => $request->niche,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/profile_pictres', $fileName);
        }

        $data = [
            'role_id' => 2,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'profile_picture' => $path,
            'business_id' => $business->id ?? '',
            'password' => Hash::make($request->password),
            'is_active' => 0,
            'vendor_type' => $request->vendor_type,

        ];
        User::create($data);
        return redirect('admin/vendors/')->with('success', 'Vendor Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('backend.vendors.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $path = '';
        $user = User::find($id);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/profile_pictres', $fileName);
            $data['profile_picture'] = $path;

        }
            $data['role_id'] = 2;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['address'] = $request->address;
        if ($request->password != '') {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);

        return redirect('admin/vendors/')->with('success', 'Vendor Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect('admin/vendors/')->with('error', 'Vendor Deleted!');
        }
        return redirect('admin/vendors/')->with('error', 'Unable to Delete Vendor!');
    }
    public function status($id)
    {
        $user = User::find($id);
        if ($user->is_active == 0) {
            $user->is_active = 1;
            $user->save();
            return redirect('admin/vendors/')->with('success', 'Vendor Has Been Changed To Active!');
        } elseif ($user->is_active == 1) {
            $user->is_active = 0;
            $user->save();
            return redirect('admin/vendors/')->with('success', 'Vendor Has Been Changed To In-Active!');
        } else {
            return redirect('admin/vendors/')->with('error', 'Unable to Change Status!');
        }
    }
}
