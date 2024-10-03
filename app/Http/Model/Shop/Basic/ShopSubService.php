<?php

namespace App\Http\Model\Shop\Basic;

use Illuminate\Database\Eloquent\Model;

class ShopSubService extends Model
{
    protected $table = 'shop_sub_service';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'item_name',
        'item_content'
    ];
}
