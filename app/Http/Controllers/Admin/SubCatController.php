<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\{Category, SubCate};
use Illuminate\Support\Str;
use Hash;

class SubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
    $subcat = SubCate::get();
        return view('backend.admin.subcat.index', compact('subcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();

        return view('backend.admin.subcat.create',compact('categories'));
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

            $path = $file->move('uploads/subcategories', $fileName);
        }

        $data = [
            'name' => $request->name,
            'image' => $path,
            'category_id'=>$request->category_id
        ];
        SubCate::create($data);
        return redirect('admin/subcategories/')->with('success', 'Category Added!');
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
        $data = SubCate::find($id);
        $categories = Category::get();

        return view('backend.admin.subcat.edit', compact('data' ,'categories'));
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
    $Category = SubCate::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $old_file = $Category->image ?? 'none';
            $filePath = public_path(str_replace('/', DIRECTORY_SEPARATOR, $old_file));
            // Delete the file from the storage
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $randomString = Str::random(10);
            $extension = $file->getClientOriginalExtension();
            $fileName = $randomString . '_' . time() . '.' . $extension;

            $path = $file->move('uploads/subcategories', $fileName);
            $data['image'] =$path;

        }
        $data['name'] = $request->name;
        $data['category_id']=$request->category_id;


        $Category->update($data);

        return redirect('admin/subcategories/')->with('success', 'Category Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = SubCate::find($id);
        if ($Category) {
            $Category->delete();
            return redirect('admin/subcategories/')->with('error', 'Category Deleted!');
        }
        return redirect('admin/subcategories/')->with('error', 'Unable to Delete Category!');
    }
    public function status($id)
    {
        $Category = SubCate::find($id);
        if ($Category->is_active == 0) {
            $Category->is_active = 1;
            $Category->save();
            return redirect('admin/subcategories/')->with('success', 'Category Has Been Changed To Active!');
        } elseif ($Category->is_active == 1) {
            $Category->is_active = 0;
            $Category->save();
            return redirect('admin/subcategories/')->with('success', 'Category Has Been Changed To In-Active!');
        } else {
            return redirect('admin/subcategories/')->with('error', 'Unable to Change Status!');
        }
    }
}
