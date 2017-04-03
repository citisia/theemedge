<?php

use Illuminate\Database\Seeder;

class DegreeCandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DegreeCandidate::class,8)->states('FirstYear', 'CAP')->create();
        factory(App\DegreeCandidate::class,3)->states('SecondYear', 'CAP')->create();
    }
}
