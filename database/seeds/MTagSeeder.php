<?php

use Illuminate\Database\Seeder;

class MTagSeeder extends Seeder
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
        DB::table('m_tags')->truncate();
        
        DB::table('m_tags')->insert([
            'id' => 1,
            'tag_name' => 'PHP',
        ]);
        DB::table('m_tags')->insert([
            'id' => 2,
            'tag_name' => 'Laravel',
        ]);
        // 外部キー制約を付加
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
