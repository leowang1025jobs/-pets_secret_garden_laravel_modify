<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopBasicTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'shop_basic';

    /**
     * Run the migrations.
     * @table shop_basic
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->string('name', 10)->comment('商家名稱');
            $table->string('type', 20)->comment('商家類型');
            $table->string('description', 150)->comment('商家描述');
            $table->text('keywords')->comment('商家搜尋關鍵字');
            $table->string('introduction')->comment('商家簡介');
            $table->string('main_feature', 180)->nullable()->comment('商家主要特色');
            $table->string('main_service', 150)->nullable()->comment('商家主要服務');
            $table->string('phone', 10)->comment('商家聯絡電話
            (手機/市話皆可)');
            $table->string('e_mail', 80)->comment('商家聯絡電子信箱');
            $table->string('address', 45)->nullable()->comment('商家所在住址');
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
