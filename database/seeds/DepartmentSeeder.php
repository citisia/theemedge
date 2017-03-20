<?php

use Carbon\Carbon;
use Facades\App\Services\Settings\DepartmentService;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        DepartmentService::create([
            'name' => 'Administration',
            'foundedOn' => Carbon::create(2016, 07, 11),
            'level' => 2,
            'displayFormat' => 1
        ]);

        DepartmentService::create([
            'name' => 'Accounts',
            'foundedOn' => Carbon::create(2016, 07, 11),
            'level' => 0,
            'displayFormat' => 1
        ]);

        DepartmentService::create([
            'name' => 'Information Technology',
            'foundedOn' => Carbon::create(2016, 07, 11),
            'level' => 2,
        ]);

        DepartmentService::create([
            'name' => 'Computer Science and Engineering',
            'foundedOn' => Carbon::create(2016, 07, 11),
            'level' => 2,
        ]);

        DepartmentService::create([
            'name' => 'Electronics and Tele-Communication',
            'foundedOn' => Carbon::create(2016, 07, 11),
            'level' => 2,
        ]);
    }
}