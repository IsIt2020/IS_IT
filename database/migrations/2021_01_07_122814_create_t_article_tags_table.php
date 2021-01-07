<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTArticleTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_article_tags', function (Blueprint $table) {
            // 記事ID
            $table->unsignedInteger('article_id')->primary()->comment('記事ID');
            // タグID
            $table->unsignedSmallInteger('tag_id')->primary()->comment('タグID');
        });

        // テーブルコメント
        DB::statement("ALTER TABLE t_article_tags COMMENT '記事タグテーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_article_tags');
    }
}
