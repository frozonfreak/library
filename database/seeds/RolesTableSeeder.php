<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
class RolesTableSeeder extends Seeder
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

        DB::table('roles')->insert([
            'name' => 'student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => NULL,
        ]);

        DB::table('roles')->insert([
            'name' => 'junior_student',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => NULL,
        ]);

        DB::table('roles')->insert([
            'name' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'deleted_at' => NULL,
        ]);
        Model::reguard();
    }
}
