<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{SubCate};

class DropdownController extends Controller
{
    public function getSubCats($parentId){
        $childOptions = SubCate::where('category_id', $parentId)->pluck('name', 'id');

return response()->json($childOptions);
    }
}
