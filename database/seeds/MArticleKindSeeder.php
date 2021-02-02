<?php

use Illuminate\Database\Seeder;

class MArticleKindSeeder extends Seeder
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
        DB::table('m_article_kinds')->truncate();
        
        DB::table('m_article_kinds')->insert([
            'article_kind_id' => config('const.db.m_article_kinds.seminar.ID'),
            'article_kind_name' => config('const.db.m_article_kinds.seminar.NAME'),
        ]);
        DB::table('m_article_kinds')->insert([
            'article_kind_id' => config('const.db.m_article_kinds.knowledge.ID'),
            'article_kind_name' => config('const.db.m_article_kinds.knowledge.NAME'),
        ]);
        // 外部キー制約を付加
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
