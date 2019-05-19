<?php

namespace App\Http\Controllers;

use App\Models\Route;

class OrderController extends Controller
{
    public function index() {
        $countries = Route::all()->unique('country');
        return view("welcome", ['countries'=>$countries]);
    }
}
