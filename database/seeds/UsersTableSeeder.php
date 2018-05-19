<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->insert([
        	[
                'id' => Uuid::generate()->string,
                'email' => 'user@mail.com',
                'username' => 'user',
                'password' => Hash::make('password'),
                'roles' => 'pelanggan',
                'verified' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'email' => 'eka123@mail.com',
                'username' => 'eka123',
                'password' => Hash::make('eka123'),
                'roles' => 'pelanggan',
                'verified' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'email' => 'staff@mail.com',
                'username' => 'staff',
                'password' => Hash::make('password'),
                'roles' => 'staff',
                'verified' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'email' => 'kepala-cabang@mail.com',
                'username' => 'kepala-cabang',
                'password' => Hash::make('password'),
                'roles' => 'kepala-cabang',
                'verified' => true,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);

        foreach (User::get() as $key => $user) {
            if ($user->roles === 'pelanggan') {
                $user->pelanggan()->create([
                    'kode_pelanggan' => null,
                    'nm_pelanggan' => $user->username,
                    'id_type' => 'KTP',
                    'id_number' => null,
                    'alamat' => 'Jakarta',
                    'no_tlp' => '1234'+$key,
                    'jml_poin' => 0,
                    'user_id' => $user->id,
                ]);
            }

            if ($user->roles === 'staff') {
                $user->staff()->create([
                    'kode_staff' => null,
                    'nm_staff' => $user->username,
                    'tgl_lahir' => '1990-10-10',
                    'alamat' => 'Jakarta',
                    'no_tlp' => '1234'+$key,
                    'user_id' => $user->id,
                ]);
            }

            if ($user->roles === 'kepala-cabang') {
                $user->kepalaCabang()->create([
                    'nm_kepala_cabang' => $user->username,
                    'no_tlp' => '1234'+$key,
                    'user_id' => $user->id,
                ]);
            }
        }
    }
}
