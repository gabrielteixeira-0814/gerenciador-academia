<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gadgets extends Model
{
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'is_enabled'
    ];
}
