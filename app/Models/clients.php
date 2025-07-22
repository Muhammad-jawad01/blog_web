<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //Field	Type	Description	
	protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'status'
    ];

}
