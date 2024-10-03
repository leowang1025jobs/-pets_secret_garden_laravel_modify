<?php

namespace App\Http\Model\Shop\Basic;

use Illuminate\Database\Eloquent\Model;

class ShopBasic extends Model
{
    protected $table = 'shop_basic';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'type',
        'description',
        'keywords',
        'introduction',
        'main_feature', 
        'main_service',
        'phone',
        'e_mail',
        'address'
    ];
}
