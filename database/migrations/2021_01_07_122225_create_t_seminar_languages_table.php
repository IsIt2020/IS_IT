<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSeminarLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_seminar_languages', function (Blueprint $table) {
            // セミナーID
            $table->unsignedInteger('seminar_id')->comment('セミナーID');
            // 言語ID
            $table->unsignedSmallInteger('language_id')->comment('言語ID');
        });

        // テーブルコメント
        DB::statement("ALTER TABLE  t_seminar_languages COMMENT 'セミナー言語テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_seminar_languages');
    }
}
