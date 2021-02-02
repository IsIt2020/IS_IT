<?php

use Illuminate\Database\Seeder;

class MArticleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 外部キー制約を一度無視
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // データのクリア
        DB::table('m_article_statuses')->truncate();
        
        DB::table('m_article_statuses')->insert([
            'status_id' => config('const.db.m_article_statuses.public.ID'),
            'status_name' => config('const.db.m_article_statuses.public.NAME'),
        ]);
        DB::table('m_article_statuses')->insert([
            'status_id' => config('const.db.m_article_statuses.temporary_save.ID'),
            'status_name' => config('const.db.m_article_statuses.temporary_save.NAME'),
        ]);
        // 外部キー制約を付加
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
