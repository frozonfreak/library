<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //Add fake users
        $this->call(UserTableSeeder::class);
        
        //Attach roles
        $this->call(RolesTableSeeder::class);

        //Add users
        $this->call(BooksTableSeeder::class);
        Model::reguard();
    }
}
