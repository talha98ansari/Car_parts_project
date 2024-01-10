<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsType extends Model
{
    protected $table = 'part_types';
    protected $fillable = ['name', 'image','is_active'];

}
