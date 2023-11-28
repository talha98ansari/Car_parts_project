<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'city' , 'phone' , 'address' , 'head_one' , 'para_one', 'is_address'
];

}
