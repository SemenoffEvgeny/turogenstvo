<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $timestamps = false;
    protected $fillable = ['FIO', 'phone_number'];
    public function orders(){
        $this->hasOne('Orders');
    }
}
