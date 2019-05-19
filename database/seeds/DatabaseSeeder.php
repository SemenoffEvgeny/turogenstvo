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
        DB::table('routes')->insert([
            'country' => "Россия",
            'city' => "Крым",
            'duration' => "14",
            'firm_id' => "1",

        ]);
        DB::table('routes')->insert([
            'country' => "Турция",
            'city' => "Аланья",
            'duration' => "14",
            'firm_id' => "2",
        ]);
        DB::table('routes')->insert([
            'country' => "Россия",
            'city' => "Сочи",
            'duration' => "20",
            'firm_id' => "2",
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
