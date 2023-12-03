<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
protected $table = 'car_model';
protected $guarded = [];
public function maker(){
    return $this->belongsTo(Maker::class);
}
}
