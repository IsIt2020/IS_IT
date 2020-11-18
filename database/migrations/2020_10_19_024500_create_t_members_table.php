<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_members', function (Blueprint $table) {

            $table->unique('user_name');

            // 会員ID(主キー)
            $table->smallIncrements('member_id');
            // メールアドレス
            $table->string('mail_address', 50);
            // パスワード
            $table->string('password');
            // 権限
            $table->tinyInteger('authority_flag')->default(0);
            // ニックネーム
            $table->string('user_name', 50);
            // 性別
            $table->tinyInteger('user_gender');
            // 生年月日
            $table->date('user_birthdate');
            // 会社
            $table->string('user_company')->nullable();
            // 退会フラグ
            $table->boolean('is_delete')->default(false);
            // 会員登録日
            $table->timestamp('insert_date');
            // ログイン情報保持用
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_members');
    }
}
