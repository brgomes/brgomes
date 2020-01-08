<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Outros\Livro;
use Faker\Generator as Faker;

$ordem = autoIncrement();

$factory->define(Livro::class, function (Faker $faker) use ($ordem) {
	$ordem->next();

	$totalpaginas = random_int(100, 400);

    return [
        'nome' 			=> $faker->name,
        'dataaquisicao' => now(),
        'ordem' 		=> $ordem->current(),
        'totalpaginas' 	=> $totalpaginas,
        'paginaslidas' 	=> $faker->numberBetween(1, $totalpaginas),
    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}
