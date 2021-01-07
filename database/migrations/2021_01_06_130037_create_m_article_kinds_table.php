<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMArticleKindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_article_kinds', function (Blueprint $table) {
            // 記事種類ID
            $table->unsignedSmallInteger('article_kind_id')->primary()->comment('記事種類ID');
            // 記事種類名
            $table->string('article_kind_name', 30)->comment('記事種類名');
        });

        // テーブルコメント
        DB::statement("ALTER TABLE m_article_kinds COMMENT '記事種類マスタ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_article_kinds');
    }
}
