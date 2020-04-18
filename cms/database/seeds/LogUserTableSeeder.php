<?php

use Illuminate\Database\Seeder;

class LogUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('log_user')->insert([
            ['log_id' => '1','user_id' =>'1'],
            ['log_id' => '2','user_id' =>'1'],
            ['log_id' => '3','user_id' =>'2'],
        ]);
    }
}
