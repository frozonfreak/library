<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;
use App\Role;

class UpdateUserRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update_role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update User Role';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $users = User::all();
        $role = Role::where('name', 'student')->first();
        foreach ($users as $user) {
            if(!$user->roles()->first()){
                //If exists attach role to user
                if(@$role)
                    $user->roles()->attach($role->id);
            }
        }
    }
}
