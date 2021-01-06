<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_comments', function (Blueprint $table) {
            // コメントID(主キー)
            $table->increments('comment_id')->comment('コメントID');
            // 記事ID
            $table->unsignedInteger('article_id')->comment('記事ID');
            // コンテンツ
            $table->mediumText('content')->comment('コンテンツ');
            // 投稿者
            $table->unsignedInteger('post_user')->comment('投稿者');
            // 投稿日,更新日
            $table->timestamps()->comment('投稿日,更新日');
        });

        // テーブルコメント
        DB::statement("ALTER TABLE users COMMENT '記事コメントテーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_comments');
    }
}
