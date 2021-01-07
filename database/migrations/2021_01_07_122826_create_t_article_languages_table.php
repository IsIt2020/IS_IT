<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTArticleLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_article_languages', function (Blueprint $table) {
            // 記事ID
            $table->unsignedInteger('article_id')->comment('記事ID');
            // 言語ID
            $table->unsignedSmallInteger('language_id')->comment('言語ID');

            // 複合キー
            $table->primary(['article_id', 'language_id']);
        });

        // テーブルコメント
        DB::statement("ALTER TABLE t_article_languages COMMENT '記事言語テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_article_languages');
    }
}
