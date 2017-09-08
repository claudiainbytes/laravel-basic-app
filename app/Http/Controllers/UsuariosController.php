<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios as Usuario;
use App\Http\Requests\UsuariosRequest;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return view("aplicacion.usuarios.usuario", [ 'data' => $usuarios ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alm = new Usuario();
        $alm->id = null;
        return view("aplicacion.usuarios.usuario-edit", [ 'alm' => $alm ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosRequest $request)
    {
        Usuario::create($request->all());
        return redirect('usuarios')->with('status', 'El registro ha sido creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alm = Usuario::find($id);
        return view("aplicacion.usuarios.usuario-edit", [ 'alm' => $alm ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuariosRequest $request, $id)
    {
        $usuario = Usuario::find($id);
        $usuario->update(['nombres' => $request->nombres,
                          'apellidos' => $request->apellidos,
                          'cedula' => $request->cedula,
                          'email' => $request->email,
                          'telefono' => $request->telefono
                        ]);
        return redirect('usuarios')->with('status', 'El registro ha sido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect('usuarios');
    }
    /**
     * Display the specified resource.
     *
     * @param  string  $campo
     * @param  string  $dato
     * @return \Illuminate\Http\Response
     */
    public function existe($campo, $dato)
    {
        $resp = 0;

        if( $campo == "cedula" || $campo == "email" ){
            $usuario = Usuario::where($campo,$dato)->get();
            $resp = ( $usuario->isNotEmpty() && ( $usuario[0][$campo] == $dato ) ) ? 1 : 0 ;
        }

        echo $resp;

    }
}
