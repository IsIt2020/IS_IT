<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_languages', function (Blueprint $table) {

            // 言語ID(主キー)(※とりあえずsmallIncrementsにしてしまった)
            $table->smallIncrements('languages_id');
            // 記事ID
            $table->smallInteger('article_id');
            // 記事の種類(なぜかlengthが1にならない助けて)
            $table->tinyInteger('article_kind')->length(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_languages');
    }
}
