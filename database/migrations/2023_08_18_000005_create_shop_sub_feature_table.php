<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopSubFeatureTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'shop_sub_feature';

    /**
     * Run the migrations.
     * @table shop_sub_feature
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->string('sub_feature', 50)->nullable()->comment('商家主要特色');
            
            $table->unsignedInteger('shop_basic_id')->comment('shop_basic 表的外鍵');
            $table->foreign('shop_basic_id')->references('id')->on('shop_basic');
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
