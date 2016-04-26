<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	/**
    	 * ensure your not on production when trying to seed data to database
    	 */

	    	if(App::environment() === 'production')
				exit('I just stopped you from being fired. Love Phil');

			$table = array(
				/**
				 * user related tables
				 */
				
					'users',
					'password_resets',
					'meta',

				/**
				 * forum related table
				 */

					'tags',
					'threads',
					'posts',
					'comments',
					'likes',

				/**
				 * morphing tables
				 */
					
					'likeables',
					'taggables'
			
			);

    	Eloquent::unguard();

        $this->call(UserTableSeeder::class);

        Eloquent::reguard();
    }
}
