<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Follow;
class followController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $follow = Follow::get();
        return view('backend.admin.follow.index', compact('follow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.follow.create');
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

            $path = $file->move('uploads/follow', $fileName);
        }

        $data = [
            'name' => $request->name,
            'image' => $path,
        ];
        Follow::create($data);
        return redirect('admin/follow/')->with('success', 'Status Added!');
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
        $data = Follow::find($id);
        return view('backend.admin.follow.edit', compact('data'));
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
        $follow = Follow::find($id);

        $data['link'] = $request->link;

        $follow->update($data);

        return redirect('admin/follow')->with('success', 'Status Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $follow = Follow::find($id);
        if ($follow) {
            $follow->delete();
            return redirect('admin/follow/')->with('error', 'Status Deleted!');
        }
        return redirect('admin/follow/')->with('error', 'Unable to Delete Status!');
    }
    public function status($id)
    {
        $follow = Follow::find($id);
        if ($follow->is_active == 0) {
            $follow->is_active = 1;
            $follow->save();
            return redirect('admin/follow/')->with('success', 'Status Has Been Changed To Active!');
        } elseif ($follow->is_active == 1) {
            $follow->is_active = 0;
            $follow->save();
            return redirect('admin/follow/')->with('success', 'Status Has Been Changed To In-Active!');
        } else {
            return redirect('admin/follow/')->with('error', 'Unable to Change Status!');
        }
    }

}
