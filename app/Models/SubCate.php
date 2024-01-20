<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCate extends Model
{
protected $table = 'sub_category';
protected $guarded = [];

public function category(){
        return $this->belongsTo(Category::class);
}
public function getshortprice($id){
    $datahigh = Part::where('sub_cat' , $id)->orderBy('price' , 'DESC')->first();
    $datalow = Part::where('sub_cat' , $id)->orderBy('price' , 'ASC')->first();

    $h = $datahigh ? round($datahigh->price, 2) : '0';
    $l = $datalow ? round($datalow->price,2) : '0';
return $h .'AED-'. $l.'AED';
}
}
