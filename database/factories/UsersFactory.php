<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Users::class, function (Faker $faker) {
	return [
		'name' => 'walker1938',
		'email' => '183851063@qq.com',
		'published_at' => bcrypt('123456'),
	];
});
