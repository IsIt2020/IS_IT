<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_comments', function (Blueprint $table) {

            // コメントID(主キー)(※とりあえずsmallIncrementsにしてしまった)
            $table->smallIncrements('comment_id');
            // 記事の種類(これもlength1が効いてない)
            $table->tinyInteger('article_kind')->length(1);
            // 記事ID
            $table->smallInteger('article_id');
            // コンテンツ
            $table->mediumText('content');
            // 投稿者
            $table->smallInteger('post_user');

        });
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
