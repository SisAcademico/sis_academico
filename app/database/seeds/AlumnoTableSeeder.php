<?php
use Faker\Factory as Faker;
class AlumnoTableSeeder extends Seeder {
	public function run()
	{
		$faker = Faker::create();
		$i=1;
		foreach (range(1, 5) as $index) {
			Alumno::create(array(
				'idalumno' =>'11356'.$i,
				'idusuario' => $i,
				'dni' => $faker->numberBetween($min = 10000000, $max = 99999999),
				'nombres' => $faker->firstNameMale,
				'apellidos' => $faker->lastName,
				'direccion' => $faker->address,
				'telefono' => $faker->phoneNumber,
				'correo' => $faker->freeEmail,
				'fecha_ingreso' => $faker->date($format = 'Y-m-d', $max = 'now'),
				'idfoto' => $i,
				'estado' => 'activo',
			));
			$i++;
		}
	}

}
