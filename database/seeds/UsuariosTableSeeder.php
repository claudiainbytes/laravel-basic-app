<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('usuarios')->delete();
        
        \DB::table('usuarios')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombres' => 'Maria',
                'apellidos' => 'Jimenez',
                'cedula' => '10000001',
                'email' => 'mariajimenez@gmail.com',
                'telefono' => '3001112222',
                'created_at' => '2017-09-03 00:00:00',
                'updated_at' => '2017-09-03 00:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'nombres' => 'Juan',
                'apellidos' => 'Rodriguez',
                'cedula' => '10000002',
                'email' => 'juanrodriguez@gmail.com',
                'telefono' => '3001113333',
                'created_at' => '2017-09-02 00:00:00',
                'updated_at' => '2017-09-04 21:31:35',
            ),
            2 => 
            array (
                'id' => 6,
                'nombres' => 'Pedro Emilio',
                'apellidos' => 'Ortiz',
                'cedula' => '10000004',
                'email' => 'pdroortiz@gmail.com',
                'telefono' => '3001114444',
                'created_at' => '2017-09-04 22:28:31',
                'updated_at' => '2017-09-04 22:28:50',
            ),
        ));
        
        
    }
}