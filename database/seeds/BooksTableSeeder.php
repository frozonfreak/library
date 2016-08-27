<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;
class BooksTableSeeder extends Seeder
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
            DB::table('books')->insert([
                'title' => $faker->name,
                'author' => $faker->name($gender = null|'male'|'female') ,
                'description' => $faker->text($maxNbChars = 200) ,
                'isbn' => $faker->isbn13,
                'quantities' => $faker->numberBetween($min = 1, $max = 20),
                'location' => $faker->swiftBicNumber,
                'image_url' => $faker->imageUrl($width = 640, $height = 480),
                'created_at' => $faker->dateTimeThisMonth($max = 'now'),
                'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
                'deleted_at' => NULL,
            ]);
        }

        Model::reguard();
    }
}
