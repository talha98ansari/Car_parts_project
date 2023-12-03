<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
protected $fillable =['name','image','description','part_type_id','category_id','price','sub_cat','creator_id','manufacturer_id','model','area'];

public function category(){
        return $this->belongsTo(Category::class);
}

public function partType(){
        return $this->belongsTo(partType::class);
    }
public function creator(){
    return $this->belongsTo(User::class);
}

}
