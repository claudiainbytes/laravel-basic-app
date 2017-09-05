<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Usuarios as Usuario;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 1; $i < 10; $i++){
            Usuario::create(['nombres' => "Nombres ".$i,
                             'apellidos' => "Apellidos ".$i,
                             'cedula' => 10000000 + $i,
                             'email' => "usuario_".$i."@gmail.com",
                             'telefono' => 3001111111 + $i
                            ]);
        }
    }
}
