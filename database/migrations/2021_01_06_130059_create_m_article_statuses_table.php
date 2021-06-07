<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMArticleStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_article_statuses', function (Blueprint $table) {
            
            // 状態ID
            $table->unsignedSmallInteger('id')->primary()->comment('状態ID');
            // 状態名
            $table->string('status_name', 16)->comment('状態名');
        });

        // テーブルコメント
        DB::statement("ALTER TABLE m_article_statuses COMMENT '記事種類マスタ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_article_statuses');
    }
}
