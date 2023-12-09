<?php

namespace App\Http\Controllers\Merch;

use Illuminate\Http\Request;
use App\Models\{Part, partType, Category, Maker, SubCate, Manufacturer, CarModel};
use Illuminate\Support\Str;
use Hash;
use Auth;
class vPartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        // $parts = Part::get();

        if(Auth::user()->role_id == 2){
            $parts = Part::where('creator_id' , Auth::user()->id)->paginate(25);

        }
        return view('backend.merch.parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $sub_categories = SubCate::get();
        $partType = partType::get();
        $manufacturer = Manufacturer::get();
        $maker = Maker::get();

        return view('backend.merch.parts.create' ,compact('sub_categories','categories','partType','manufacturer','maker'));
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
        $data['price'] = $request->price;
        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['sub_cat'] = $request->sub_cat;
        // $data['manufacturer_id'] = $request->manufacturer_id;
        $data['model'] = $request->model;
        $data['state'] = $request->model;
        $data['part_type_id'] = $request->part_type_id;
        $data['description'] = $request->description;
        $data['area'] = $request->state;
        $data['image'] = $path;

        $data['manufacturer_name'] = $request->manufacturer_name;
        $data['maker_id'] = $request->maker_id;
        $data['mode_name'] = $request->model_name;

        $data['creator_id'] = Auth::user()->id;

        Part::create($data);
        return redirect('vendor/vparts/')->with('success', 'Part Added!');
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
        $sub_categories = SubCate::get();
        $partType = partType::get();
        $manufacturer = Manufacturer::get();
        $models = CarModel::get();
        $maker = Maker::get();

        return view('backend.merch.parts.edit', compact('sub_categories','categories','partType','data','manufacturer','models','maker'));
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
        $data['price'] = $request->price;
        $data['name'] = $request->name;
        $data['category_id'] = $request->category_id;
        $data['sub_cat'] = $request->sub_cat;
        $data['manufacturer_id'] = $request->manufacturer_id;
        $data['model'] = $request->model;
        $data['state'] = $request->model;
        $data['part_type_id'] = $request->part_type_id;
        $data['description'] = $request->description;
        $data['area'] = $request->state;
        $data['creator_id'] = Auth::user()->id;

        $data['manufacturer_name'] = $request->manufacturer_name;
        $data['maker_id'] = $request->maker_id;
        $data['model_name'] = $request->model_name;

        $part->update($data);

        return redirect('vendor/vparts')->with('success', 'Part Added!');
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
            return redirect('vendor/vparts/')->with('error', 'Part Deleted!');
        }
        return redirect('vendor/vparts/')->with('error', 'Unable to Delete Part!');
    }
    public function status($id)
    {
        $part = Part::find($id);
        if ($part->is_active == 0) {
            $part->is_active = 1;
            $part->save();
            return redirect('vendor/vparts/')->with('success', 'Part Has Been Changed To Active!');
        } elseif ($part->is_active == 1) {
            $part->is_active = 0;
            $part->save();
            return redirect('vendor/vparts/')->with('success', 'Part Has Been Changed To In-Active!');
        } else {
            return redirect('vendor/vparts/')->with('error', 'Unable to Change Status!');
        }
    }
}
