<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

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
                'id' => Uuid::generate()->string,
                'email' => 'user@mail.com',
                'username' => 'User',
                'password' => Hash::make('secret'),
                'roles' => 'pelanggan',
                'verified' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'email' => 'staff@mail.com',
                'username' => 'Staff',
                'password' => Hash::make('secret'),
                'roles' => 'staff',
                'verified' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'email' => 'manager@mail.com',
                'username' => 'Manager',
                'password' => Hash::make('secret'),
                'roles' => 'manager',
                'verified' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
