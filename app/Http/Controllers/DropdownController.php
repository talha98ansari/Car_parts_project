<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\{SubCate, CarModel, Part, Favourite};
use Auth;

class DropdownController extends Controller
{
    public function getSubCats($parentId)
    {
        $childOptions = SubCate::where('category_id', $parentId)->pluck('name', 'id');
        return response()->json($childOptions);
    }
    public function getModel($parentId)
    {
        $carModelIds = CarModel::where('maker_id', $parentId)->get();

        $filteredCarModelIds = Part::whereIn('model', $carModelIds)->pluck('model');

        // Now, filter the CarModel query based on the filtered IDs
        $data = CarModel::whereIn('id', $filteredCarModelIds)->pluck('name', 'id');
        return response()->json($data);
    }
    public function getstate($parentId)
    {
        $carModelIds = Part::where('model', $parentId)->pluck('area');

        // $filteredCarModelIds = Part::whereIn('model', $carModelIds)->pluck('model');

        // Now, filter the CarModel query based on the filtered IDs
        return response()->json($carModelIds);
    }
    public function getstateMK($parentId)
    {
        $carModelIds = Part::where('maker_id', $parentId)->groupBy('area')->pluck('area');

        // $filteredCarModelIds = Part::whereIn('model', $carModelIds)->pluck('model');

        // Now, filter the CarModel query based on the filtered IDs
        return response()->json($carModelIds);
    }

    public function AddToFav($ct)
    {
        if(Auth::user()){
            Favourite::create([
                'user_id' => Auth::id(),
                'product_id' => $ct
            ]);
            return response()->json(['status'=>true ,'message'=>'added']);
        }else{
            return response()->json(['status'=>false ,'message'=>'login']);

        }

    }
    public function RemoveFav($ct)
    {
        Favourite::where('user_id', Auth::id())->where('product_id', $ct)->delete();
        return response()->json(['status'=>true ,'message'=>'removed']);
    }


    public function searchForPro(Request $request){
        $searchTerm = $request->input('q') ?? '';
        $results = [];
        if($searchTerm != ''){

            $results = Part::where('name', 'LIKE', "%{$searchTerm}%")->get();
        return response()->json($results);

        }else{
        return response()->json($results);

        }

      }
      public function AddToCart($ct)
      {
          if(Auth::user()){
              Cart::create([
                  'user_id' => Auth::id(),
                  'product_id' => $ct
              ]);
            $count= Cart::where('user_id' , Auth::user()->id)->get()->count();
              return response()->json(['status'=>true ,'message'=>'added','count' =>$count]);
          }else{
              return response()->json(['status'=>false ,'message'=>'login']);

          }

      }
      public function RemoveCart($ct)
      {
        $parts = [];

        Cart::where('user_id', Auth::id())
            ->where('product_id', $ct)
            ->delete();

        $parts = Cart::join('parts', 'parts.id', '=', 'carts.product_id')
            ->where('parts.is_active', 1)
            ->where('user_id', Auth::id())
            ->pluck('parts.price')
            ->toArray(); // Convert plucked values to an array

        $count = count($parts);
        $total_price = array_sum($parts);

        // Debugging output

        return response()->json([
            'count' => $count,
            'total_price' => $total_price,
            'parts' => $parts,
            'status'=>true
        ]);      }


}
