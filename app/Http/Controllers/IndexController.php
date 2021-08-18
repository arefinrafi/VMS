<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Category;

class IndexController extends Controller
{
    public function index(){

        //In descending Order
        $vehiclesAll = Vehicle::whereRaw('booking_status != "booked"')->orderBy('id','DESC')->paginate(6);
        //In random order

        //Get all categories and sub categories
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        //$categories = json_encode(json_encode($categories));
        //echo "<pre>";  print_r($categories); die;

        return view('index')->with(compact('vehiclesAll','categories'));
    }

    public function usersignin()
    {
        return view('frontend.pages.usersignin');

    }
}
