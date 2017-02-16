<?php

$factory->define(App\DegreeAdmissionEnquiry::class, function (Faker\Generator $faker) {
    $faker->addProvider(new \Faker\Provider\en_IN\Address($faker));
    $faker->addProvider(new \Faker\Provider\en_IN\Person($faker));
    $faker->addProvider(new \Faker\Provider\en_IN\PhoneNumber($faker));
    $faker->addProvider(new \Faker\Provider\en_IN\Internet($faker));

    return [
        'firstName' => $faker->firstName,
        'middleName' => $faker->firstNameMale,
        'lastName' => $faker->lastName,
        'contactNo' => $faker->phoneNumber,
        'mobileNo' => $faker->phoneNumber,
        'residentialArea' => $faker->localityName,
        'sscPercentage' => $faker->randomFloat(2,35,99.99)
    ];
});

$factory->state(App\DegreeAdmissionEnquiry::class, 'first_year', function (Faker\Generator $faker) {
    return [
        'appliedForYear'=> 1,
        'hscPercentage' => $faker->randomFloat(2,40,99.99),
        'cetPhysics' => $faker->numberBetween(0,100),
        'cetChemistry' => $faker->numberBetween(0,100),
        'cetMaths' => $faker->numberBetween(0,100),
        'jeeMainScore' => $faker->numberBetween(0,360)
    ];
});

$factory->state(App\DegreeAdmissionEnquiry::class, 'second_year', function (Faker\Generator $faker) {
    return [
        'appliedForYear'=> 1,
        'diplomaPercentage' => $faker->randomFloat(2,50,99.99)
    ];
});