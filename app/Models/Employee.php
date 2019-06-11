<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function routes(){
        return $this->hasOne('App\Models\Route');

    }
}
