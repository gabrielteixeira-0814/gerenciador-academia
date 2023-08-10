<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'user_id',
        'employee_id',
        'client_type_id',
        'date',
        'age',
        'weight',
        'height',
        'is_enabled'
    ];
}
