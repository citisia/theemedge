<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\DegreeCandidate::class, function (Faker\Generator $faker) {
    $faker->addProvider(new \Faker\Provider\en_IN\Address($faker));
    $faker->addProvider(new \Faker\Provider\en_IN\Person($faker));
    $faker->addProvider(new \Faker\Provider\en_IN\PhoneNumber($faker));
    $faker->addProvider(new \Faker\Provider\en_IN\Internet($faker));
    $courses = App\Course::get();


    $course = $faker->randomElement(array_wrap($courses[0]));

    return [
        'firstName' => $faker->firstName,
        'middleName' => $faker->firstNameMale,
        'lastName' => $faker->lastName,
        'fatherName' => $faker->firstNameMale,
        'contactNo' => $faker->mobileNumber,
        'mobileNo' => $faker->mobileNumber,
        'residentialArea' => $faker->localityName,
        'sscPercentage' => $faker->randomFloat(2,35,99.99),
        'dateOfBirth' => $faker->dateTimeBetween('-20 years','-18 years'),
        'gender' => 'M',
        'course_id' => $course->id,
        'studentCategory' => 0,
    ];
});

$factory->state(App\DegreeCandidate::class,'FirstYear', function(Faker\Generator $faker) {
    return [
        'appliedForYear'=> 1,
        'hscPercentage' => $faker->randomFloat(2,40,99.99),
        'cetPhysics' => $faker->numberBetween(0,100),
        'cetChemistry' => $faker->numberBetween(0,100),
        'cetMaths' => $faker->numberBetween(0,100),
        'jeeMainScore' => $faker->numberBetween(0,360)
    ];
});

$factory->state(App\DegreeCandidate::class,'SecondYear', function(Faker\Generator $faker) {
    return [
        'appliedForYear'=> 1,
        'diplomaPercentage' => $faker->randomFloat(2,50,99.99)
    ];
});

$factory->state(App\DegreeCandidate::class,'CAP', function(Faker\Generator $faker) {
    return [
        'admissionType' => 1,
        'admissionReferenceId' => $faker->randomDigitNotNull(8)
    ];
});

$factory->state(App\DegreeCandidate::class,'OBC', function(Faker\Generator $faker) {
    return [
        'studentCategory' => 1,
    ];
});


$factory->state(App\DegreeCandidate::class,'SCST', function(Faker\Generator $faker) {
    return [
        'studentCategory' => 2,
    ];
});

$factory->state(App\DegreeCandidate::class,'VJNT', function(Faker\Generator $faker) {
    return [
        'studentCategory' => 3,
    ];
});


