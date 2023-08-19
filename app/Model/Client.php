<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Client_type;

class Client extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'client_type_id',
        'age',
        'weight',
        'height',
        'is_employee',
        'is_enabled'
    ];

    public function user() {

        return $this->belongsTo(User::class, 'user_id');
    }

    public function clients_type() {

        return $this->belongsTo(Client_type::class, 'client_type_id');
    }
}
