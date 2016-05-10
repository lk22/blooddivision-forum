<?php

use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

use Blooddivision\Thread;

class ThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/**
    	 * creating faker instance
    	 *
    	 * @var $faker Faker\Factory
    	 */
        $faker = Faker::create();

        /**
         * creating new thread instance
         *
         * @var $thread Thread
         */
        $thread = new Thread;

        /**
         * lets make faker decide if null or current time 
         */
        $thrash = $faker->randomElement([
        	null,
        	Carbon::now()
        ]);

        /**
         * creating 40 thread models that belongs to a random user
         */
        foreach(range(1, 40) AS $index){
        	$thread->create([
        		'name' => $faker->sentence(5),
        		'user_id' => rand(1, 60)
        	]);
        }
    }
}
