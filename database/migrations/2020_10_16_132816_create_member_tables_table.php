<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_tables', function (Blueprint $table) {
          // 会員ID(主キー)
          $table->smallIncrements('MEMBER_ID');
          // メールアドレス
          $table->string('MAIL_ADDRESS', 50);
          // パスワード
          $table->string('PASSWORD');
          // 権限
          // $table->tinyInteger('AUTHORITY_FLAG');
          // ニックネーム
          $table->string('USER_NAME', 50);
          // 性別
          // $table->tinyInteger('USER_SEX');
          // 生年月日
          // $table->date('USER_BIRTHDATE');
          // 会社
          // $table->string('USER_COMPANY')->nullable();
          // 退会フラグ
          // $table->boolean('IS_DELETE')->default(false);
          // 会員登録日
          $table->timestamp('INSERT_DATE');
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
        Schema::dropIfExists('member_tables');
    }
}
