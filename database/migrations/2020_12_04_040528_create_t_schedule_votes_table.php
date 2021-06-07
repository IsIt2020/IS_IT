<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTScheduleVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_schedule_votes', function (Blueprint $table) {
            
            $table->id();
            // セミナーID(主キー)
            $table->smallInteger('article_id');
            // メンバーID(主キーにしたかったけどうまくいかないのでとりあえず)
            $table->smallInteger('member_id');
            // 開催希望日
            $table->datetime('scheduled_date')->nullable();

            // ユニークキー
            $table->unique(['article_id', 'member_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_schedule_votes');
    }
}
