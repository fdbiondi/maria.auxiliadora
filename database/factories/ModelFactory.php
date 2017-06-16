<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Entities\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'file_number' => $faker->unique()->numberBetween(0,100000),
        'dni' => $faker->randomNumber(8),
        'city_id' => 1,
        'role_id' => 2,
    ];
});

$factory->define(App\Entities\Subject::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(6),
        'description' => $faker->text(20),
    ];
});

$factory->define(App\Entities\Country::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(8),
    ];
});

$factory->define(App\Entities\Province::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(8),
        'country_id' => 1,
    ];
});

$factory->define(App\Entities\City::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(8),
        'province_id' => 1,
    ];
});

$factory->define(App\Entities\Role::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->text(8),
    ];
});

$factory->define(App\Entities\Level::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->unique()->numberBetween(1,5),
    ];
});

$factory->define(App\Entities\Division::class, function (Faker\Generator $faker){
    return [
        'name' => $faker->unique()->randomElement(['A','B','C']),
    ];
});

$factory->define(App\Entities\Plan::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Plan ' . $faker->date('Y'),
        'code' => $faker->unique()->numberBetween(0,10),
        'date' => $faker->date('d/m/Y'),
        'level_id' => $faker->randomDigit,
    ];
});

$factory->define(App\Entities\PlanSubject::class, function (Faker\Generator $faker) {
    return [
        'plan_id' => $faker->randomDigit,
        'subject_id' => $faker->randomDigit,
    ];
});

$factory->define(App\Entities\CourseRegistration::class, function (Faker\Generator $faker) {
    

    return [
        'course_id' => App\Entities\Course::get()->random()->id,
        'user_id' => App\Entities\User::where('role_id', 2)->get()->random()->id,
    ];
});

$factory->define(App\Entities\SubjectRegistration::class, function (Faker\Generator $faker) {
    return [
        'status' => 'pending',
        'course_user_id' => App\Entities\CourseRegistration::get()->random()->id,
        'subject_id' => App\Entities\Subject::get()->random()->id,
    ];
});

