<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Maker;
use Illuminate\Support\Str;
use Hash;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $makers = Maker::get();
        return view('backend.admin.maker.index', compact('makers'));
    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.maker.create');
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

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/makers', $fileName);
        }

        $data = [
            'name' => $request->name,
            'image' => $path,
        ];
        Maker::create($data);
        return redirect('admin/makers/')->with('success', 'Category Added!');
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
        $data = Maker::find($id);
        return view('backend.admin.maker.edit', compact('data'));
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
        $Category = Maker::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/makers', $fileName);
            $data['image'] =$path;

        }
        $data['name'] = $request->name;

        $Category->update($data);

        return redirect('admin/makers/')->with('success', 'Category Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Maker::find($id);
        if ($Category) {
            $Category->delete();
            return redirect('admin/makers/')->with('error', 'Category Deleted!');
        }
        return redirect('admin/makers/')->with('error', 'Unable to Delete Category!');
    }
    public function status($id)
    {
        $Category = Maker::find($id);
        if ($Category->is_active == 0) {
            $Category->is_active = 1;
            $Category->save();
            return redirect('admin/makers/')->with('success', 'Category Has Been Changed To Active!');
        } elseif ($Category->is_active == 1) {
            $Category->is_active = 0;
            $Category->save();
            return redirect('admin/makers/')->with('success', 'Category Has Been Changed To In-Active!');
        } else {
            return redirect('admin/makers/')->with('error', 'Unable to Change Status!');
        }
    }
}
