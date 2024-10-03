<?php

namespace App\Http\Model\Shop\News\Basic;

use Illuminate\Database\Eloquent\Model;

class ShopNewsTag extends Model
{
    protected $table = 'shop_news_tag';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
}
