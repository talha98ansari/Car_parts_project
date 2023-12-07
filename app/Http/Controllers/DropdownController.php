<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{SubCate, CarModel, Part};

class DropdownController extends Controller
{
    public function getSubCats($parentId){
        $childOptions = SubCate::where('category_id', $parentId)->pluck('name', 'id');

return response()->json($childOptions);
    }
    public function getModel($parentId){
    $carModelIds = CarModel::where('maker_id', $parentId)->get();

    $filteredCarModelIds = Part::whereIn('model', $carModelIds)->pluck('model');

// Now, filter the CarModel query based on the filtered IDs
            $data = CarModel::whereIn('id', $filteredCarModelIds)->pluck('name', 'id');
            return response()->json($data);

    }   public function getstate($parentId){
        $carModelIds = Part::where('model', $parentId)->pluck('area');

        // $filteredCarModelIds = Part::whereIn('model', $carModelIds)->pluck('model');

    // Now, filter the CarModel query based on the filtered IDs
                return response()->json($carModelIds);

    }

}
