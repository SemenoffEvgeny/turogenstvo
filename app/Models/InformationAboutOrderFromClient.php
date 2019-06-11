<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InformationAboutOrderFromClient extends Model
{
    protected $fillable = ['client_id', 'number_of_person'];
}
