<?php

namespace App\Http\Model\Shop\About;

use Illuminate\Database\Eloquent\Model;

class ShopGoalItem extends Model
{
    protected $table = 'shop_goal_item';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'item_content'
    ];
}
