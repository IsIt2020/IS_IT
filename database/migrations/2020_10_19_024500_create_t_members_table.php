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

            //mail_addressをユニークに指定
            $table->unique('mail_address');

            // 会員ID(主キー)
            $table->integerIncrements('member_id');
            // メールアドレス
            $table->string('mail_address', 100);
            // パスワード
            $table->string('password', 255);
            // 権限ID
            $table->tinyInteger('authority_id')->default(0);
            // ニックネーム
            $table->string('user_name', 50);
            // 性別
            $table->tinyInteger('user_sex');
            // 生年月日
            $table->date('user_birthdate');
            // 会社
            $table->string('user_company', 255)->nullable();
            // ログイン情報保持用
            $table->rememberToken();
            // 会員登録日
            $table->timestamp('created_at')->nullable();
            // 更新日
            $table->timestamp('updated_at')->nullable();
            // 退会フラグ
            $table->boolean('is_deleted')->default(false);
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
