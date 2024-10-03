<?php

namespace App\Http\Model\User\Basic;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'account',
        'name',
        'e_mail',
    ];
}
