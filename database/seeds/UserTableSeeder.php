<?php 

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

/**
* users table seeder
*/
class UserTableSeeder extends Seeder
{
	public function run(){

		$faker = Faker::create();

		

		echo "---------------------------
			  |						    |
			  |						    |
			  |	Seeding fresh new users |
			  |							|
			  |							|
			  |-------------------------|";

		foreach(range(1, 20) as $index){
			$name = $faker->name;

			$email = $faker->safeEmail;

			foreach(count($name) as $name){
				echo $name;
			}

			User::create([
				'name' => $name,
				'email' => $email,
				'password' => bcrypt('secret'),
				'active' => true,
				'rememberToken' => str_random(10)
			]);
		}

		echo "---------------------------------
			  |						    	  |
			  |						    	  |
			  |	all users seeded successfully |
			  |							      |
			  |							      |
			  |-------------------------------|";


	}
}








 ?>