<?php

namespace App\Http\Model\Shop\News\Basic;

use Illuminate\Database\Eloquent\Model;

class ShopNewsSort extends Model
{
    protected $table = 'shop_news_sort';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'news_sort'
    ];
}
