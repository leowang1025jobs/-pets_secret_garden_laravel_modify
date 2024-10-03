<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopSubServiceTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'shop_sub_service';

    /**
     * Run the migrations.
     * @table shop_sub_service
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->string('item_name', 20)->comment('商家次要服務項目的名稱');
            $table->string('item_content', 100)->nullable()->comment('商家次要服務項目的內容');
            $table->unsignedInteger('shop_basic_id')->comment('shop_basic 表的外鍵');

            $table->foreign('shop_basic_id')->references('id')->on('shop_basic');

            // $table->foreign('shop_basic_id', 'fk_shop_sub_feature_shop_basic_idx')
            //     ->references('id')->on('shop_basic')
            //     ->onDelete('no action')
            //     ->onUpdate('no action');
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
