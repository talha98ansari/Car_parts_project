<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Part extends Model
{
protected $fillable =['name','image','description','part_type_id','category_id','price','sub_cat','creator_id','manufacturer_id','model','area',
'manufacturer_name','model_name','maker_id','location'
];

public function category(){
        return $this->belongsTo(Category::class);
}

public function partType(){
        return $this->belongsTo(PartsType::class);
    }
public function creator(){
    return $this->belongsTo(User::class);
}
public function checkFav(){
    return $this->belongsTo(Favourite::class,'id' , 'product_id')->where('user_id' , Auth::id());
}
public function images(){
    return $this->hasMany(Image::class,'product_id');
}

}
