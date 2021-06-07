<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMAuthoritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_authorities', function (Blueprint $table) {
            
            //権限ID(主キー)
            $table->tinyInteger('id')->comment('権限ID');
            //権限名
            $table->string('authority_name', 30)->comment('権限名');
        });

        // テーブルコメント
        DB::statement("ALTER TABLE  m_authorities COMMENT '権限マスタ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_authorities');
    }
}
