<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Hash;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $categories = Category::get();
        return view('backend.admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.categories.create');
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

            $path = $file->move('uploads/categories', $fileName);
        }

        $data = [
            'name' => $request->name,
            'image' => $path,
        ];
        Category::create($data);
        return redirect('admin/categories/')->with('success', 'Category Added!');
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
        $data = Category::find($id);
        return view('backend.admin.categories.edit', compact('data'));
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
        $Category = Category::find($id);
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

            $path = $file->move('uploads/categories', $fileName);
            $data['image'] =$path;

        }
        $data['name'] = $request->name;

        $Category->update($data);

        return redirect('admin/categories/')->with('success', 'Category Added!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::find($id);
        if ($Category) {
            $Category->delete();
            return redirect('admin/categories/')->with('error', 'Category Deleted!');
        }
        return redirect('admin/categories/')->with('error', 'Unable to Delete Category!');
    }
    public function status($id)
    {
        $Category = Category::find($id);
        if ($Category->is_active == 0) {
            $Category->is_active = 1;
            $Category->save();
            return redirect('admin/categories/')->with('success', 'Category Has Been Changed To Active!');
        } elseif ($Category->is_active == 1) {
            $Category->is_active = 0;
            $Category->save();
            return redirect('admin/categories/')->with('success', 'Category Has Been Changed To In-Active!');
        } else {
            return redirect('admin/categories/')->with('error', 'Unable to Change Status!');
        }
    }
}
