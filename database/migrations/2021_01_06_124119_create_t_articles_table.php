<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_articles', function (Blueprint $table) {
            // 記事ID(主キー)
            $table->increments('article_id')->comment('記事ID');
            // 記事種類ID
            $table->unsignedTinyInteger('article_kind')->comment('記事種類ID');
            // タイトル
            $table->string('title', 255)->comment('タイトル');
            // サブタイトル
            $table->string('sub_title', 255)->nullable()->comment('サブタイトル');
            // コンテンツ
            $table->mediumText('content')->comment('コンテンツ');
            // トップイメージ
            $table->string('top_image', 100)->default('default_top.png')->comment('トップイメージ');
            // 投稿者
            $table->unsignedInteger('post_user')->comment('投稿者');
            // ステータスid
            $table->unsignedSmallInteger('status_id')->comment('ステータスid');
            // 閲覧数
            $table->unsignedInteger('number_views')->comment('閲覧数');
            // 投稿日,更新日
            $table->timestamps();
            // 削除フラグ
            $table->boolean('is_deleted')->default(false)->comment('削除フラグ');
        });

        // テーブルコメント
        DB::statement("ALTER TABLE t_articles COMMENT '記事テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_articles');
    }
}
