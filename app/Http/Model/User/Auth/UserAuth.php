<?php

namespace App\Http\Model\User\Auth;

use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    protected $table = 'users_auth';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'identity_level',
        'users_basic_id '
    ];
}
