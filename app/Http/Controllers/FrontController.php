<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, Partner, Review, AboutUs, ContactUs, OtherPages, Part, PartType};

class FrontController extends Controller
{


    public function index(){

        $categories = Category::get();
        $reviews = Review::get();
        $partners = Partner::get();
        return view('frontend.index' , compact('categories','partners', 'reviews'));
    }

    public function about_us(){
        $about_us = AboutUs::whereNotNull('head_one')->first();
        return view('frontend.web_pages.Aboutus' , compact('about_us'));
    }
    public function contact(){
        $contact_content = ContactUs::where('is_address' , 0)->first();
        $addresses = ContactUs::where('is_address' , 1)->get();

        return view('frontend.web_pages.contactUs' , compact('contact_content','addresses'));
    }
    public function legel_terms(){
        $data = OtherPages::where('title' , 'legal_terms')->first();
        return view('frontend.web_pages.legal_terms' , compact('data'));
    }
    public function terms_condition(){
        $data = OtherPages::where('title' , 'terms_conditions')->first();
        return view('frontend.web_pages.termsandconditions' , compact('data'));
    }
    public function privacy_policy(){
        $data = OtherPages::where('title' , 'privacy_policy')->first();
        return view('frontend.web_pages.privacyPolicy' , compact('data'));
    }
    public function partview($id){
        $data = Part::where('part_type_id' , $id)->get();
        $partInfo = PartType::where('id' , $id)->first();
        return view('frontend.category' , compact('data' , 'partInfo'));
    }
    public function catrgoryview($id){
        $data = Part::where('category_id' , $id)->get();
        return view('frontend.single_category' , compact('data'));
    }
    public function partdetail($id){
        $data = Part::where('id' , $id)->first();
        $categories = Category::get();
        return view('frontend.product' , compact('data' , 'categories'));
    }

}
