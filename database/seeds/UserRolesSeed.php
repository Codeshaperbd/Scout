<?php

use Illuminate\Database\Seeder;
use App\Role;
class UserRolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_agent  = new App\Role;
        $role_broker = new App\Role;

        $role_agent->name = "Agent";
        $role_agent->save();

        $role_broker->name = "Broker";
        $role_broker->save();
    }
}
