<?php 

	use Faker\Factory as Faker;

	use Illuminate\Database\Seeder;
	use Blooddivision\Post;

	class PostTableSeeder extends Seeder {

		public function run() {

			$faker = Faker::create();
			$post = new Post;

			$range = range(1, 30);

			foreach($range as $item){

				$post->create([
					'text' => $faker->sentence(rand(1, 10)),
					'thread_id' => rand(1, 40)
				]);

			}
		}


	}