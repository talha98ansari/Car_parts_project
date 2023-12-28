<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Maker;
use Illuminate\Support\Str;
use Hash;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('backend.admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.slider.create');
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
$data=$request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/makers', $fileName);
        }

        $data['image'] = $path;
        Slider::create($data);
        return redirect('admin/slider/')->with('success', 'Slider Added!');
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
        $data = Slider::find($id);
        return view('backend.admin.slider.edit', compact('data'));
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
        $Slider = Slider::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/slider', $fileName);
            $data['image'] = $path;

        }
        $data=$request->all();

        $Slider->update($data);

        return redirect('admin/slider/')->with('success', 'Slider Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Slider = Slider::find($id);
        if ($Slider) {
            $Slider->delete();
            return redirect('admin/slider/')->with('error', 'Slider Deleted!');
        }
        return redirect('admin/slider/')->with('error', 'Unable to Delete Slider!');
    }
    public function status($id)
    {
        $Slider = Slider::find($id);
        if ($Slider->is_active == 0) {
            $Slider->is_active = 1;
            $Slider->save();
            return redirect('admin/slider/')->with('success', 'Slider Has Been Changed To Active!');
        } elseif ($Slider->is_active == 1) {
            $Slider->is_active = 0;
            $Slider->save();
            return redirect('admin/slider/')->with('success', 'Slider Has Been Changed To In-Active!');
        } else {
            return redirect('admin/slider/')->with('error', 'Unable to Change Status!');
        }
    }
}
