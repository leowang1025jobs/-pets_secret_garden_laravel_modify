<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAuthTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users_auth';

    /**
     * Run the migrations.
     * @table users_auth
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->string('password', 14)->comment('使用者登入密碼');
            $table->enum('identity_level', ['M', 'C'])->comment('使用者身分級別
            (\'M\'=管理者, \'C\'=顧客)');
            $table->unsignedInteger('users_basic_id')->comment('users_basic 表的外鍵');
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
