<?php

namespace App\Http\Model\Shop\About;

use Illuminate\Database\Eloquent\Model;

class ShopHistoryMilestone extends Model
{
    protected $table = 'shop_history_milestone';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'content',
        'date'
    ];
}
