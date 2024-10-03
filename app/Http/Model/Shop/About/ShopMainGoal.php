<?php

namespace App\Http\Model\Shop\About;

use Illuminate\Database\Eloquent\Model;
use App\Http\Model\Shop\About\ShopGoalItem;

class ShopMainGoal extends Model
{
    protected $table = 'shop_main_goal';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'introduction'
    ];

    public function goalItems(){
       return $this->hasMany(ShopGoalItem::class, 'shop_main_goal_id', 'id');
    }
}
