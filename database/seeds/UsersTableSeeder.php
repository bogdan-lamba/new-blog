<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Admin',
                'email' => 'admin@updivision.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'role_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Bogdan Lamba',
                'email' => 'bogdan.lamba89@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('parola123'),
                'role_id' => '2',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

       foreach (User::all() as $user) {
           $user->generateAvatar();
       }

        Artisan::call('storage:link', [] );
    }
}
