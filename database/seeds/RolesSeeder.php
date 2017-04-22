<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $management = new Role();
        $management->name = "Management";
        $management->save();

        $studentAdministrator = new Role();
        $management->name = "Student Administrator";
        $management->save();

        $accountant = new Role();
        $accountant->name = "accountant";
        $accountant->save();
    }
}
