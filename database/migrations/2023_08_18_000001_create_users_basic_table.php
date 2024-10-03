<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersBasicTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users_basic';

    /**
     * Run the migrations.
     * @table users_basic
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->string('account', 20)->comment('使用者帳號');
            $table->string('name', 30)->comment('使用者顯示名稱');
            $table->string('photo', 50)->nullable()->comment('註冊時照片的路徑(上層目錄與檔案名)');
            $table->date('birthday')->nullable()->comment('使用者出生日期(年/月/日)');
            $table->string('phone', 10)->comment('使用者聯絡電話');
            $table->string('e_mail', 80)->comment('使用者聯絡電子信箱');
            $table->string('introduction')->nullable()->comment('使用者自我簡介');
            $table->string('address', 150)->nullable()->comment('使用者居住地址');
            $table->text('website')->nullable()->comment('個人網站位置(URL)');
            $table->dateTime('created_at')->comment('建立時間(註冊時)');
            $table->dateTime('updated_at')->comment('更新時間(註冊時)');
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
