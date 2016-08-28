<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $faker = Faker::create();
        foreach (range(1,100) as $index) {
            DB::table('users')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'age' => $faker->numberBetween($min = 15, $max = 50),
                'email' => $faker->email,
                'password' => $faker->password, //Not hashed - temp password
                'remember_token' => $faker->password,
                'created_at' => $faker->dateTimeThisMonth($max = 'now'),
                'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
                'deleted_at' => NULL,
            ]);
        }

        Model::reguard();
    }
}
