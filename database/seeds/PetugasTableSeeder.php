<?php

use Illuminate\Database\Seeder;

class PetugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('petugas')->insert([
			[
				'id' => '1',
				'name' => 'Admin',
				'username' => 'admin',
				'password' => bcrypt('admin'),
				'id_level' => '1'
			],

			[
				'id' => '2',
				'name' => 'Operator',
				'username' => 'operator',
				'password' => bcrypt('operator'),
				'id_level' => '2',
			],

		]);        
    }
}
