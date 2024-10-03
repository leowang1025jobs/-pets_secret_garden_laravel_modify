<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopNewsReplymentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'shop_news_replyment';

    /**
     * Run the migrations.
     * @table shop_news_replyment
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->text('content')->comment('回應內容');
            $table->dateTime('reply_date')->comment('回應日期');
            $table->integer('replyment_id')->nullable()->default('0')->comment('同一則回覆的其他回覆(如果為0，代表這則沒有回覆)');
            $table->unsignedInteger('shop_news_basic_id')->comment('shop_news_basic 表的外鍵');
            $table->unsignedInteger('users_basic_id')->comment('users_basic 表的外鍵');
            $table->foreign('shop_news_basic_id')->references('id')->on('shop_news_basic');
            $table->foreign('users_basic_id')->references('id')->on('users_basic');

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
