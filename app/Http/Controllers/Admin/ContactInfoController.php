<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $users = ContactInfo::get();
        return view('backend.admin.c_info.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = ContactInfo::find($id);

        if ($user) {
            $user->delete();
            return redirect('/admin/contact-info')->with('error', 'Deleted!');
        }
        return redirect('/admin/contact-info')->with('error', 'Unable to Delete!');
    }
}
