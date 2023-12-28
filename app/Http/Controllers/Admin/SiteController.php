<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\{AboutUs, ContactUs, OtherPages};
class SiteController extends Controller
{
    public function aboutUs()
    {
        $data = AboutUs::whereNotNull('head_one')->first();

        return view('backend.admin.site_settings.about_us.edit', compact('data'));
    }
    public function storeAboutUs(Request $request, $id)
    {
        $data['head_one'] = $request->head_one;
        $data['para_one'] = $request->para_one;
        $data['head_two'] = $request->head_two;
        $data['para_two'] = $request->para_two;
        AboutUs::where('id', $id)->update($data);
        return redirect()
            ->back()
            ->with('success', 'Data Has Been Updated');
    }

    public function contactUs()
    {
        $data = ContactUs::where('is_address', 0)->first();
        $addresses = ContactUs::where('is_address', 1)->get();
        return view('backend.admin.site_settings.contact_us.edit', compact('data', 'addresses'));
    }
    public function storecontactUs(Request $request, $id)
    {
        $data['head_one'] = $request->head_one;
        $data['para_one'] = $request->para_one;

        ContactUs::where('id', $id)->update($data);
        return redirect()
            ->back()
            ->with('success', 'Data Has Been Updated');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.site_settings.contact_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data['city'] = $request->city;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['is_address'] = 1;

        ContactUs::create($data);
        return redirect('admin/site-setting/contact-us/')->with('success', 'Address Added!');
    }
    public function edit($id)
    {
        $data = ContactUs::find($id);
        return view('backend.admin.site_settings.contact_us.c_edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $path = '';
        $partType = ContactUs::find($id);
        $data['city'] = $request->city;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['is_address'] = 1;

        $partType->update($data);

        return redirect('admin/site-setting/contact-us')->with('success', 'Updated Successfully!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ContactUs::find($id);
        if ($data) {
            $data->delete();
            return redirect('admin/site-setting/contact-us')->with('error', 'Address Deleted!');
        }
        return redirect('admin/site-setting/contact-us')->with('error', 'Unable to Delete Address!');
    }
    public function status($id)
    {
        $data = Address::find($id);
        if ($data->is_active == 0) {
            $data->is_active = 1;
            $data->save();
            return redirect('admin/site-setting/contact-us')->with('success', 'Address Has Been Changed To Active!');
        } elseif ($data->is_active == 1) {
            $data->is_active = 0;
            $data->save();
            return redirect('admin/site-setting/contact-us')->with('success', 'Address Has Been Changed To In-Active!');
        } else {
            return redirect('admin/site-setting/contact-us')->with('error', 'Unable to Change Status!');
        }
    }

    public function othersIndex()
    {
        $pages = OtherPages::get();
        return view('backend.admin.site_settings.others.index', compact('pages'));
    }

    public function othersCreate(){
        return view('backend.admin.site_settings.others.create');
    }
    public function Otheredit(OtherPages $data){
    return view('backend.admin.site_settings.others.edit' , compact('data'));
    }
    public function Otherupdate(Request $request, $id){
        $OtherPages = OtherPages::find($id);
        $data['sub_title'] = $request->sub_title;
        $data['content'] = $request->content;


        $OtherPages->update($data);
          return redirect()
            ->back()
            ->with('success', 'Data Has Been Updated');

    }

    
}
