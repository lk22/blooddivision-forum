<?php 

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Blooddivision\User;

/**
* users table seeder
*/
class UserTableSeeder extends Seeder
{
	public function run(){

		$faker = Faker::create();
		$user = new User;

		$email = $faker->email;

		$password = bcrypt('secret');

		$active = $faker->randomElement([true, false]);
		
		$testUsers = [];

		$testUsers[] = User::create([
			'name' => "Leokk2200",
			'email' => "nightskater-220@hotmail.com",
			'password' => "1",
			'active' => true
		]); 

		$testUsers[] = User::create([
			'name' => "Tardboi",
			'email' => "stevenkaninnus@hotmail.com",
			'password' => "2",
			'active' => true
		]); 

		$testUsers[] = User::create([
			'name' => "Kiiltom",
			'email' => "binder_tom@hotmail.com",
			'password' => "3",
			'active' => true
		]); 
		
		foreach(range(1, 57) as $index){
			$user->create([
				'name' => $faker->userName,
				'email' => $faker->safeEmail,
				'password' => $password,
				'active' => $faker->randomElement([true, false])
			]);
		}
	}
}

 ?>