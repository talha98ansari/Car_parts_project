<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\partType;
use Illuminate\Support\Str;
use Hash;

class partTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $partType = partType::get();
        return view('backend.partType.index', compact('partType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partType.create');
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

            $path = $file->move('uploads/partType', $fileName);
        }

        $data = [
            'name' => $request->name,
            'image' => $path,
        ];
        partType::create($data);
        return redirect('admin/partType/')->with('success', 'Part Type Added!');
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
        $data = partType::find($id);
        return view('backend.partType.edit', compact('data'));
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
        $partType = partType::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/partType', $fileName);
            $data['image'] =$path;

        }
        $data['name'] = $request->name;

        $partType->update($data);

        return redirect('admin/partType')->with('success', 'Part Type Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partType = partType::find($id);
        if ($partType) {
            $partType->delete();
            return redirect('admin/partType/')->with('error', 'Part Type Deleted!');
        }
        return redirect('admin/partType/')->with('error', 'Unable to Delete Part Type!');
    }
    public function status($id)
    {
        $partType = partType::find($id);
        if ($partType->is_active == 0) {
            $partType->is_active = 1;
            $partType->save();
            return redirect('admin/partType/')->with('success', 'Part Type Has Been Changed To Active!');
        } elseif ($partType->is_active == 1) {
            $partType->is_active = 0;
            $partType->save();
            return redirect('admin/partType/')->with('success', 'Part Type Has Been Changed To In-Active!');
        } else {
            return redirect('admin/partType/')->with('error', 'Unable to Change Status!');
        }
    }
}
