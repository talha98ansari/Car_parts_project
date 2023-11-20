<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Part,partType,Category};
use Illuminate\Support\Str;
use Hash;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $parts = Part::get();
        return view('backend.parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $partType = partType::get();

        return view('backend.parts.create' , compact('categories','partType'));
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

            $path = $file->move('uploads/Parts', $fileName);
        }

        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['part_type_id'] = $request->part_type_id;
        $data['description'] = $request->description;
        $data['price'] = $request->price;
        $data['image'] = $path;

        Part::create($data);
        return redirect('admin/parts/')->with('success', 'Part Added!');
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
        $data = Part::find($id);
        $categories = Category::get();
        $partType = partType::get();

        return view('backend.parts.edit', compact('categories','partType','data'));
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
        $part = Part::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/Parts', $fileName);
            $data['image'] =$path;

        }
        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['part_type_id'] = $request->part_type_id;
        $data['description'] = $request->description;
        $data['price'] = $request->price;


        $part->update($data);

        return redirect('admin/parts')->with('success', 'Part Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = Part::find($id);
        if ($part) {
            $part->delete();
            return redirect('admin/parts/')->with('error', 'Part Deleted!');
        }
        return redirect('admin/parts/')->with('error', 'Unable to Delete Part!');
    }
    public function status($id)
    {
        $part = Part::find($id);
        if ($part->is_active == 0) {
            $part->is_active = 1;
            $part->save();
            return redirect('admin/parts/')->with('success', 'Part Has Been Changed To Active!');
        } elseif ($part->is_active == 1) {
            $part->is_active = 0;
            $part->save();
            return redirect('admin/parts/')->with('success', 'Part Has Been Changed To In-Active!');
        } else {
            return redirect('admin/parts/')->with('error', 'Unable to Change Status!');
        }
    }
}
