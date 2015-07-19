<?php
use Faker\Factory as Faker;
class UsuarioTableSeeder extends Seeder {
	public function run()
    {
        Usuario::create([
            'usuario' => 'ISC0ADMIN1',
            'password'   =>  Hash::make('iamlinux'),
            'tipo_usuario'   => 'administrador',
            'estado'      => 'activo',
        ]);
    }

}
