<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Client;

class Client_type extends Model
{
    protected $table = 'clients_type';

    protected $fillable = [
        'type',
        'is_enabled',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class, 'id');
    }
}
