<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopGoalItemTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'shop_goal_item';

    /**
     * Run the migrations.
     * @table shop_goal_item
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->string('item_content', 80)->comment('商家目標項目內容');
            $table->unsignedInteger('shop_main_goal_id')->comment('shop_main_goal 表的外鍵');
            $table->foreign('shop_main_goal_id')->references('id')->on('shop_main_goal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
