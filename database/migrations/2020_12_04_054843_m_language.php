<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_language', function (Blueprint $table) {

            // 言語ID(主キー)
            $table->smallInteger('language_id')->primary();
            // 言語名
            $table->string('language_name', 30);
            // カラム
            $table->string('m_languagecol', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_language');
    }
}
