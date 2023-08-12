<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client_type extends Model
{
    protected $table = 'clients_type';

    protected $fillable = [
        'type',
        'is_enabled',
    ];
}
