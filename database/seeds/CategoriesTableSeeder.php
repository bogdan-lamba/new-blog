<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => '1',
                'name' => 'Technology',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'name' => 'Lifestyle',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'name' => 'Tutorial',
                'created_at' => now(),
                'updated_at' => now()
            ]

        ]);
    }
}
