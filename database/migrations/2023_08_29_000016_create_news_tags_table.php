<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTagsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'news_tags';

    /**
     * Run the migrations.
     * @table news_tags
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
            $table->unsignedInteger('shop_news_tag_id')->comment('shop_news_tag 表外鍵');
            $table->foreign('shop_news_tag_id')->references('id')->on('shop_news_tag');
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
