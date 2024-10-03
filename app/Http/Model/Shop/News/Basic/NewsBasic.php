<?php

namespace App\Http\Model\Shop\News\Basic;

use Illuminate\Database\Eloquent\Model;

class NewsBasic extends Model
{
    protected $table = 'shop_news_basic';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'news_main_title',
        'news_sub_title',
        'news_content',
        'shop_basic_id',
        'users_basic_id'
    ];
}
