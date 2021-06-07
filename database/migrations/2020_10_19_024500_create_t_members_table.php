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

            // 会員ID(主キー)
            $table->id()->comment('会員ID');
            // メールアドレス
            $table->string('mail_address', 100)->comment('メールアドレス');
            // パスワード
            $table->string('password')->comment('パスワード(ハッシュ化)');
            // 権限ID
            $table->tinyInteger('authority_id')->default(0)->comment('権限ID');
            // ニックネーム
            $table->string('user_name', 50)->comment('ニックネーム');
            // 性別
            $table->tinyInteger('user_sex')->comment('性別');
            // 生年月日
            $table->date('user_birthdate')->comment('生年月日');
            // 会社
            $table->string('user_company')->nullable()->comment('会社');
            // ログイン情報保持用
            $table->rememberToken()->comment('ログイン情報保持用');
            // 会員登録日
            $table->timestamp('created_at')->nullable()->comment('会員登録日');
            // 更新日
            $table->timestamp('updated_at')->nullable()->comment('更新日');
            // 退会フラグ
            $table->boolean('is_deleted')->default(false)->comment('退会フラグ');

            //mail_addressをユニークに指定
            $table->unique('mail_address');
        });

        // テーブルコメント
        DB::statement("ALTER TABLE t_members COMMENT '会員テーブル'");
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
