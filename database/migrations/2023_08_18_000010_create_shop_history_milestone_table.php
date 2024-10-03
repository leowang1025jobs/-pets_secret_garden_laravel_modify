<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopHistoryMilestoneTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'shop_history_milestone';

    /**
     * Run the migrations.
     * @table shop_history_milestone
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->string('content', 50)->comment('商家里程碑紀載內容');
            $table->date('date')->comment('商家里程碑日期');
            $table->unsignedInteger('shop_main_history_id')->comment('shop_main_history 表的外鍵');
            $table->foreign('shop_main_history_id')->references('id')->on('shop_main_history');
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
