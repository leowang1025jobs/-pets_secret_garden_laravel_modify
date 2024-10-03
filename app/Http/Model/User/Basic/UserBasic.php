<?php

namespace App\Http\Model\User\Basic;

use Illuminate\Database\Eloquent\Model;

class UserBasic extends Model
{
    protected $table = 'users_basic';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'account',
        'name',
        'photo',
        'birthday',
        'phone',
        'e_mail',
        'introduction',
        'address',
        'website'
    ];
}
