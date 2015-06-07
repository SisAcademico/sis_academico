<?php
use Faker\Factory as Faker;
class FotoTableSeeder extends Seeder {
	public function run()
	{
		$faker = Faker::create();
		foreach (range(1, 5) as $index) {
			Foto::create(array(
				'imagen' => $faker->imageUrl($width = 640, $height = 480),
			));
		}
	}

}
