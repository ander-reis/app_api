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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    $faker_br = Faker\Factory::create('pt_br');

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password(),
        'ds_cpf' => $faker_br->cpf,
        'ds_rg' => $faker_br->rg,
        'dt_nascimento' => $faker->dateTime('Y-m-d'),
        'ds_cep' => mt_rand(01000, 99999) . '-' . mt_rand(100, 999),
        'ds_endereco' => $faker->streetName,
        'ds_numero' => $faker->randomNumber(3, false),
        'ds_complemento' => '',
        'ds_bairro' => $faker->citySuffix,
        'ds_cidade' => $faker->city,
        'ds_uf' => $faker_br->regionAbbr,
        'ds_ddd_residencial' => $faker_br->areaCode,
        'ds_fone_residencial' => $faker_br->landline,
        'ds_ddd_fone_celular' => $faker_br->areaCode,
        'ds_fone_celular' => $faker_br->cellphone(false),
        'fl_sexo' => rand(0,1),
        'fl_email_ativo' => rand(0,1),
        'fl_celular_ativo' => rand(0,1),
        'remember_token' => str_random(10),
    ];
});

//$factory->define(\App\Models\User::class, function (Faker\Generator $faker) {
//    static $password;
//
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'remember_token' => str_random(10),
//    ];
//});
