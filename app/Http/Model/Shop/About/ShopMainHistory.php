<?php

namespace App\Http\Model\Shop\About;

use Illuminate\Database\Eloquent\Model;

class ShopMainHistory extends Model
{
    protected $table = 'shop_main_history';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'introduction'
    ];
}
