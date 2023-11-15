<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Review;
use App\Models\Partner;

class FrontController extends Controller
{
    public function index(){

        $categories = Category::get();
        $reviews = Review::get();
        $partners = Partner::get();


        return view('frontend.index' , compact('categories','partners', 'reviews'));
    }
}
