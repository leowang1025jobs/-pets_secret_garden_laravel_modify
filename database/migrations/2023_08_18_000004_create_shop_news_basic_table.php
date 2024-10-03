<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopNewsBasicTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'shop_news_basic';

    /**
     * Run the migrations.
     * @table shop_news_basic
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->string('news_main_title', 50)->comment('商家最新消息的主標題');
            $table->string('news_sub_title', 50)->nullable()->comment('商家最新消息的次標題');
            $table->text('news_content')->comment('商家最新消息的內容');
            $table->unsignedInteger('shop_basic_id')->comment('shop_basic表 的外鍵');
            $table->foreign('shop_basic_id')->references('id')->on('shop_basic');
            $table->unsignedInteger('users_basic_id')->comment('users_basic表 的外鍵');
            $table->foreign('users_basic_id')->references('id')->on('users_basic');
            $table->dateTime('created_at')->comment('建立時間');
            $table->dateTime('updated_at')->comment('更新時間');
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
