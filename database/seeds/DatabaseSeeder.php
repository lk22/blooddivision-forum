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

			/**
			 * define database tables
			 *
			 * @var $table array
			 */

				$tables = [
					/**
					 * user related tables
					 */
					
						'users',
						'password_resets',

					/**
					 * forum related table
					 */

						'tags',
						'threads',
						'posts',
						'comments',
						'likes',

					/**
					 * pivot tables
					 */
					
						'comment_post',
						'thread_post'
				
				];

			/**
			 * define seeders
			 *
			 * @var $seeders array
			 */

				$seeders = [
					"main_seeders" => [
						UserTableSeeder::class,
						// ThreadTableSeeder::class,
						// PostTableSeeder::class,
						// CommentTableSeeder::class,
						// LikeTableSeeder::class
					],

					"pivot_seeders" => [
						// CommentPostTableSeeder::class,
						// ThreadPostTableSeeder::class
					]
				];

		/**
		 * we only seeding records to the database on local environments
		 */
		
			if(App::environment() === 'local' || App::environment() === 'staging'){

				/**
				 * Ungard eloquent
				 */
				
					Eloquent::unguard();

				/**
				 * set foreign key checks to zero => false
				 */
				
					DB::statement('SET FOREIGN_KEY_CHECKS = 0');

					echo "_____________________\n";
	                echo "Calling seeders... Hold on \n";
	                echo "_____________________\n";

                /**
                 * truncating data from all the database tables everytime php artisan db:seed command is triggered
                 */
                
                	echo "truncating tables\n";
                    echo "--------------\n";

                    foreach($tables as $table){
                    	echo "truncating: " . $table . "\n";
                    	DB::table($table)->truncate();

                    	echo "--Truncated table " . $table . "\n";
                    }

                /**
                 * seeding all tables
                 */

                    echo "_________________________________\n";
                    echo "All database tables is truncated.\n\n";
                    echo "We are now seeding the tables\n";
                    echo "_________________________________\n\n";

	                /**
	                 * main tables
	                 */

	                    echo "----------------------------------\n";
	                    echo "-------->  Main tables  <=--------\n";
	                    echo "----------------------------------\n";

	                    foreach($seeders['main_seeders'] as $seeder){
	                    	echo "Calling: " . $seeder . "\n";
	                    	$this->call($seeder);
	                    }

	                    echo "Main tables seeded\n\n";

	                /**
	                 * pivot tables
	                 */

	                    echo "----------------------------------\n";
	                    echo "-------->  pivot tables  <--------\n";
	                    echo "----------------------------------\n";

	                    foreach($seeders['pivot_seeders'] as $pivot){
	                    	echo "Calling pivot table seeder: " . $pivot . "\n";
	                    	$this->call($pivot);
	                    }

	                    echo "Pivot tables seeded\n\n";

	            echo "___________________________________________________\n";
                echo "all database tables are filled up with fresh data!! \n";
                echo "___________________________________________________\n";

	            /**
	             * set foreign key checks to one => true
	             */
	            
	            	DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        			Eloquent::reguard();

			}

    }
}
