<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Maker;
use App\Models\CarModel;
use Illuminate\Support\Str;
use Hash;

class ModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $models = CarModel::get();
        return view('backend.admin.carmodel.index', compact('models'));
    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makers = Maker::get();
        return view('backend.admin.carmodel.create', compact('makers'));
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

            $path = $file->move('uploads/models', $fileName);
        }

        $data = [
            'name' => $request->name,
            'maker_id' => $request->maker_id,
            'image' => $path,
        ];
        CarModel::create($data);
        return redirect('admin/models/')->with('success', 'Category Added!');
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
        $data = CarModel::find($id);
        $makers = Maker::get();

        return view('backend.admin.carmodel.edit', compact('data' , 'makers'));
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
        $Category = CarModel::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/models', $fileName);
            $data['image'] =$path;

        }
        $data['name'] = $request->name;
        $data['maker_id'] = $request->maker_id;

        $Category->update($data);

        return redirect('admin/models/')->with('success', 'Category Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = CarModel::find($id);
        if ($Category) {
            $Category->delete();
            return redirect('admin/models/')->with('error', 'Category Deleted!');
        }
        return redirect('admin/models/')->with('error', 'Unable to Delete Category!');
    }
    public function status($id)
    {
        $Category = CarModel::find($id);
        if ($Category->is_active == 0) {
            $Category->is_active = 1;
            $Category->save();
            return redirect('admin/models/')->with('success', 'Category Has Been Changed To Active!');
        } elseif ($Category->is_active == 1) {
            $Category->is_active = 0;
            $Category->save();
            return redirect('admin/models/')->with('success', 'Category Has Been Changed To In-Active!');
        } else {
            return redirect('admin/models/')->with('error', 'Unable to Change Status!');
        }
    }
}
