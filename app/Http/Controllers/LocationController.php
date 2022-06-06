<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(){
        return view('home');
    }

    public function store(Request $request){

        Location::create([
            'service_num'=>$request->service,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'latitude'=>$request->lat,
            'longitude'=>$request->lng,
        ]);
        return view('home');
    }
}
