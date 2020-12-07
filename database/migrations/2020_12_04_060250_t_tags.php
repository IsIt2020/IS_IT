<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_tags', function (Blueprint $table) {

            // タグID(主キー)(※とりあえずsmallIncrementsにしてしまった)
            $table->smallIncrements('tag_id');
            // 記事ID
            $table->smallInteger('article_id');
            // テーブルフラグ(なぜかlengthが1にならない助けて)
            $table->tinyInteger('table_flag')->length(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_tags');
    }
}
