<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TSeminerArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_seminer_articles', function (Blueprint $table) {

            // 記事ID(主キー)
            $table->smallIncrements('article_id');
            // セミナーID
            $table->smallInteger('seminer_id');
            // タイトル
            $table->string('title', 255);
            // サブタイトル
            $table->string('sub_title', 255)->nullable();
            // コンテンツ
            $table->mediumText('content');
            // トップイメージ
            $table->string('top_image', 255);
            // イメージ
            $table->string('images', 255)->nullable();
            // 投稿者
            $table->smallInteger('post_user');
            // 投稿日
            $table->datetime('post_date');
            // 更新日
            $table->datetime('update_date');
            // ステータス
            $table->tinyInteger('status');
            // 閲覧数(ミディアムの方が良さげのため型は符号なしmediumInt)
            $table->unsignedMediumInteger('number_views');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_seminer_articles');
    }
}
