<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CarRepair;
use Illuminate\Support\Str;
use Hash;

class CarRepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $carrepair = CarRepair::get();
        return view('backend.admin.car_repair.index', compact('carrepair'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.car_repair.create');
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

            $path = $file->move('uploads/carrepair', $fileName);
            $data['thumbnail'] =$path;

        }
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['link'] = $request->link;

        CarRepair::create($data);
        return redirect('admin/carrepair/')->with('success', 'Section Added!');
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
        $data = CarRepair::find($id);
        return view('backend.admin.car_repair.edit', compact('data'));
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
        $carrepair = CarRepair::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $old_file = $carrepair->image ?? 'none';
            $filePath = public_path(str_replace('/', DIRECTORY_SEPARATOR, $old_file));
            // Delete the file from the storage
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/carrepair', $fileName);
            $data['thumbnail'] =$path;

        }
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['link'] = $request->link;

        $carrepair->update($data);

        return redirect('admin/carrepair')->with('success', 'Section Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id == 1){
            return redirect('admin/carrepair/')->with('error', 'Cannot Delete This Section In Active Instead!');

        }
        $carrepair = CarRepair::find($id);
        if ($carrepair) {
            $carrepair->delete();
            return redirect('admin/carrepair/')->with('error', 'Section Deleted!');
        }
        return redirect('admin/carrepair/')->with('error', 'Unable to Delete Section!');
    }
    public function status($id)
    {
        $carrepair = CarRepair::find($id);

        if ($carrepair->is_active == 0) {
            $carrepair->is_active = 1;
            $carrepair->save();
            return redirect('admin/carrepair/')->with('success', 'Section Has Been Changed To Active!');
        } elseif ($carrepair->is_active == 1) {
            $carrepair->is_active = 0;
            $carrepair->save();
            return redirect('admin/carrepair/')->with('success', 'Section Has Been Changed To In-Active!');
        } else {
            return redirect('admin/carrepair/')->with('error', 'Unable to Change Status!');
        }
    }
}
