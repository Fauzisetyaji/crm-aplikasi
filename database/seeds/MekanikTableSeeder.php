<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

class MekanikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('mekaniks')->insert([
        	[
                'id' => Uuid::generate()->string,
                'nm_mekanik' => 'Mekanik 1',
                'alamat' => 'Jakarta',
                'no_tlp' => "021 123 456",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'nm_mekanik' => 'Mekanik 2',
                'alamat' => 'Jakarta',
                'no_tlp' => "021 123 456",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'id' => Uuid::generate()->string,
                'nm_mekanik' => 'Mekanik 3',
                'alamat' => 'Jakarta',
                'no_tlp' => "021 123 456",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
