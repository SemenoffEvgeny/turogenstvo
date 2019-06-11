<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    public $timestamps = false;
    protected $fillable = ['route_id', 'client_id', 'flight_id', 'total_cost'];
}
