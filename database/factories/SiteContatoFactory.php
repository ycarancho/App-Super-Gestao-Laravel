<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        'nome'=> $faker->name,
        'email'=> $faker->safeEmail,
        'telefone'=>$faker->tollFreePhoneNumber,
        'motivo_contato'=> $faker->biasedNumberBetween(1,3),
        'mensagem'=> $faker->text(200) 
    ];
});
