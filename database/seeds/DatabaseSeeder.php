<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 外部キー制約を一度無視
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call([
            /**
             * マスタデータ作成
             */
            // 言語マスタ
            MLanguageSeeder::class,
            // タグマスタ
            MTagSeeder::class,
            // 権限マスタ
            MAuthoritySeeder::class,
            // 記事種類マスタ
            MArticleKindSeeder::class,
            // 記事状態マスタ
            MArticleStatusSeeder::class,
            // セミナー状態マスタ
            MSeminarStatusSeeder::class,
        ]);

        // 外部キー制約を付加
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
