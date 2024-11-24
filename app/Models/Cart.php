<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
protected $guarded=[];

public function Fav($id){

    $f = Favourite::where('product_id',$id)->where('user_id' , Auth::id())->first();
    if($f != null){
        return true;
    }else{
        return false;
    }
}

public function Cartverfiy($id){
    $f = self::where('product_id',$id)->where('user_id' , Auth::id())->first();
    if($f != null){
        return true;
    }else{
        return false;
    }
}
}
