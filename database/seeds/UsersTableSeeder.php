<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$faker = \Faker\Factory::create();
	
		// Let's make sure everyone has the same password and
		// let's hash it before the loop, or else our seeder
		// will be too slow.
		$password = Hash::make('toptal');
	
		// And now let's generate a few dozen users for our app:
		for ($i = 0; $i < 10; $i++) {
			Users::create([
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => $password,
			]);
		}
    }
}
