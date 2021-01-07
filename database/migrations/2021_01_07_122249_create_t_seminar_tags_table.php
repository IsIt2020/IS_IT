<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTSeminarTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_seminar_tags', function (Blueprint $table) {
            // セミナーID
            $table->unsignedInteger('seminar_id')->comment('セミナーID');
            // タグID
            $table->unsignedSmallInteger('tag_id')->comment('タグID');
            
            // 複合キー
            $table->primary(['seminar_id', 'tag_id']);
        });

        // テーブルコメント
        DB::statement("ALTER TABLE  t_seminar_tags COMMENT 'セミナータグテーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_seminar_tags');
    }
}
