<?php

use Illuminate\Database\Seeder;

class LocalEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentSeeder::class);
    }
}
