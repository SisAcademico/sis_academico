<?php
use Faker\Factory as Faker;
class UsuarioTableSeeder extends Seeder {
	public function run()
    {
        Usuario::create([
            'usuario' => 'ISC0123456',
            'password'   =>  Hash::make('iamlinux'),
            'tipo_usuario'   => 'administrador',
            'estado'      => 'activo',
        ]);
    }

}
