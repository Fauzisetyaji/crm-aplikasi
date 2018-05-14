<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('services')->insert([
    		[
                'id' => Uuid::generate()->string,
                'nm_service' => 'CPU Diagnostics',
                'jenis_service' => 'ringan',
                'description' => ' detect problems long before they cause a breakdown. Diagnostic tools can also check a cars computer system for manufacturer notifications and stored information about the cars history, giving technicians a complete picture in order to perform the best repair.',
                'poin' => '1000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'nm_service' => 'Suspension',
                'jenis_service' => 'berat',
                'description' => 'makes it possible to control the vehicle while driving. Car suspension works by absorbing the shock from the wheels as it travels along the road, giving the wheels the ability to continue following the road without losing control.',
                'poin' => '1000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'nm_service' => 'Engine',
                'jenis_service' => 'berat',
                'description' => 'repair and tune-up to an engine overhaul, Repco Authorised Service have all the skills and expertise to get you back on the road.',
                'poin' => '1000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'nm_service' => 'Brakes',
                'jenis_service' => 'ringan',
                'description' => 'Quick brake repair and replacement services for domestic and import vehicles. 23-point brake inspection, fixing rotors, calipers and brake pads check.',
                'poin' => '1000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'nm_service' => 'Steering',
                'jenis_service' => 'ringan',
                'description' => 'The system usually contains a power steering pump, steering gear & linkages, drive belts, bearings, valves, hoses and seals. Power steering is a system for reducing the steering effort on cars by using an external power source to assist in turning the wheels.',
                'poin' => '1000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => Uuid::generate()->string,
                'nm_service' => 'Exhaust System',
                'jenis_service' => 'berat',
                'description' => 'We offer Competitive Precision Exhaust Systems and Repairs including Performance Exhaust Systems.',
                'poin' => '1000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
    	]);
    }
}
