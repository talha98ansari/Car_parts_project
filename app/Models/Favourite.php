<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Favourite extends Model
{
    protected $fillable = [
        'user_id', 'product_id'
    ];
    public function Fav($id){
        $f = Favourite::where('product_id',$id)->where('user_id' , Auth::id())->first();
        if($f != null){
            return true;
        }else{
            return false;
        }
    }
}
