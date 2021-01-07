<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTArticleImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_article_images', function (Blueprint $table) {
            
            //画像ID(主キー)
            $table->bigInteger('image_id')->primary()->comment('画像ID');
            //記事ID
            $table->integer('article_id')->nullable()->comment('記事ID');
            //会員ID
            $table->integer('member_id')->comment('会員ID');
            //画像PATH
            $table->string('image_path', 100)->comment('画像PATH');
        });

         // テーブルコメント
         DB::statement("ALTER TABLE  t_article_images COMMENT '記事画像テーブル'");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_article_images');
    }
}
