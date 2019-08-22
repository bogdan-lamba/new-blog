<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use YoHang88\LetterAvatar\LetterAvatar;

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
            'name' => 'Admin Admin',
            'email' => 'admin@updivision.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'role_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        $avatar = new LetterAvatar('Admin Admin', 'circle', '40');
        $avatar->saveAs('storage/app/public/' . '1' . '.png', LetterAvatar::MIME_TYPE_PNG);
    }
}
