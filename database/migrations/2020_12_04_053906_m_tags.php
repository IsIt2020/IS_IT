<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_tags', function (Blueprint $table) {

            // タグID(主キー)
            $table->smallInteger('tag_id')->primary();
            // タグ名
            $table->string('tag_name', 30);
            // カラム
            $table->string('m_tagscol', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_tags');
    }
}
