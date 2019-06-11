<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Flight;
use App\Models\Hotel;
use App\Models\InformationAboutOrderFromClient;
use App\Models\Order;
use App\Models\Route;
use App\Models\TransferInfo;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $countries = Route::all()->unique('country');
        $employee = Route::find(1)->employee;
        return view("welcome", ['countries'=>$countries,
                                      'employee'=>$employee]);

    }
    public function ajaxCityPost (Request $request) {
        $response = Route::all()->where('country',$request->country);
        return response()->json($response);
    }
    public function ajaxCostPost (Request $request) {
        $response = Route::all()->where('city',$request->city);
        return response()->json($response);
    }
    public function ajaxCity(){
        return view("welcome");
    }
    public function create(Request $request){
        $client = Client::create([
            'FIO' => $request->fio,
            'phone_number' => $request->phone,
        ]);
        $client->save();
        $route = Route::where('country', $request->country)
                        ->where('city', $request->city)
                        ->get()
                        ->first();
        $cl_inf = InformationAboutOrderFromClient::create([
            'client_id' => $client->id,
            'number_of_person' => $request->quantity,
        ]);
        $cl_inf->save();
        $flight = TransferInfo::where('id', $route->transfer_info_id)
            ->get()
            ->first();
        $flight1 = Flight::where('id', $flight->id)
            ->get()
            ->first();
        $hotel = Hotel::where('id', $route->hotel_id)
            ->get()
            ->first();
        $order = Order::create([
            'client_id' => $client->id,
            'route_id' => $route->id,
            'flight_id' => $flight->id,
            'total_cost' => $route->cost * $request->quantity,
        ]);
        $order->save();

        return view("otchet",compact('flight1','flight','hotel','client','route','cl_inf'));
    }
}
