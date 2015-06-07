<?php
use Faker\Factory as Faker;
class UsuarioTableSeeder extends Seeder {
	public function run()
	{
		$faker = Faker::create();
		foreach (range(1, 5) as $index) {
			Usuario::create(array(
				'password' => $faker->password,
				'tipo_usuario' => 'alumno',
			));
		}
	}

}
