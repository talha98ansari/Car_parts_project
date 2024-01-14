<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Tool;
use Illuminate\Support\Str;
use Hash;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $tools = Tool::get();
        return view('backend.admin.tools.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.tools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/service', $fileName);
        $data['image'] = $path;

        }
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['description'] = $request->description;
        $data['location'] = $request->location;
        $data['price'] = $request->name;

        Tool::create($data);
        return redirect('admin/tool/')->with('success', 'Tool Added!');
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
        $data = Tool::find($id);
        return view('backend.admin.tools.edit', compact('data'));
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
        $tool = Tool::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $old_file = $tool->image ?? 'none';
            $filePath = public_path(str_replace('/', DIRECTORY_SEPARATOR, $old_file));
            // Delete the file from the storage
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/service', $fileName);
            $data['image'] = $path;

        }

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['description'] = $request->description;
        $data['location'] = $request->location;
        $data['price'] = $request->name;

        $tool->update($data);

        return redirect('admin/tool/')->with('success', 'Tool Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = Tool::find($id);
        if ($tool) {
            $tool->delete();
            return redirect('admin/tool/')->with('error', 'Tool Deleted!');
        }
        return redirect('admin/tool/')->with('error', 'Unable to Delete Tool!');
    }
    public function status($id)
    {
        $tool = Tool::find($id);
        if ($tool->is_active == 0) {
            $tool->is_active = 1;
            $tool->save();
            return redirect('admin/tool/')->with('success', 'Tool Has Been Changed To Active!');
        } elseif ($tool->is_active == 1) {
            $tool->is_active = 0;
            $tool->save();
            return redirect('admin/tool/')->with('success', 'Tool Has Been Changed To In-Active!');
        } else {
            return redirect('admin/tool/')->with('error', 'Unable to Change Status!');
        }
    }
}
