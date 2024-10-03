<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestMessageTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'guest_message';

    /**
     * Run the migrations.
     * @table guest_message
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->comment('主鍵');
            $table->string('guest_name', 20)->comment('留言訪客的名字');
            $table->string('guset_identity', 10)->nullable()->comment('留言訪客身分(職業)別');
            $table->string('guest_e_mail', 80)->comment('留言訪客的聯絡電子信箱');
            $table->enum('message_type', ['I', 'S', 'T'])->comment('留言內容分類
            (\'I\'=使用問題, \'S\'=建議, \'T\'=想法)');
            $table->string('message_title', 50)->comment('留言標題');
            $table->string('message_content', 250)->comment('留言內容');
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
