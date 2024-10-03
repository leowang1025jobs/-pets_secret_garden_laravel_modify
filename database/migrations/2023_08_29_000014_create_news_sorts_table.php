<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsSortsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'news_sorts';

    /**
     * Run the migrations.
     * @table news_sorts
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->unsignedInteger('shop_news_basic_id')->comment('shop_news_basic 表外鍵');
            $table->foreign('shop_news_basic_id')->references('id')->on('shop_news_basic');
            $table->unsignedInteger('shop_news_sort_id')->comment('shop_news_sort 表外鍵');
            $table->foreign('shop_news_sort_id')->references('id')->on('shop_news_sort');
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
