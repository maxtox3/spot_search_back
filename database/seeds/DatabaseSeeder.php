<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            'name' => 'Food',
            'description' => 'Поедим?',
            'primary_color' => '#348C39',
            'second_color' => '#3AA541',
        ]);

        DB::table('actions')->insert([
            'name' => 'Chill out',
            'description' => 'Отдохнем?',
            'primary_color' => '#157EFB',
            'second_color' => '#67b6f4',
        ]);

        DB::table('actions')->insert([
            'name' => 'Play',
            'description' => 'Поиграем?',
            'primary_color' => '#F16F4E',
            'second_color' => '#F16F4E',
        ]);

        DB::table('actions')->insert([
            'name' => 'Ride',
            'description' => 'Катнём?',
            'primary_color' => '#692498',
            'second_color' => '#aa4cba',
        ]);

        DB::table('actions')->insert([
            'name' => 'Watch',
            'description' => 'Посмотрим?',
            'primary_color' => '#d64423',
            'second_color' => '#fd8a69',
        ]);

        DB::table('actions')->insert([
            'name' => 'Listen',
            'description' => 'Послушаем?',
            'primary_color' => '#0e786a',
            'second_color' => '#52b6ac',
        ]);

        DB::table('actions')->insert([
            'name' => 'Dance',
            'description' => 'Потанцуем?',
            'primary_color' => '#c42b2e',
            'second_color' => '#ed5454',
        ]);
    }
}
