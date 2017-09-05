<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = "usuarios";

    protected $primaryKey = "id";

    protected $fillable = ['nombres', 'apellidos', 'cedula', 'email', 'telefono'];
}
