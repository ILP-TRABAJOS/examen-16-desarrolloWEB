<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = DB::select('select * from usuario');
        return view('usuarios/table')->with("sql", $sql);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $clave = md5($request->password);
        $sql = DB::insert('insert into usuario(usuario,ape_nom,password)values(?,?,?)', [
            $request->usuario,
            $request->nombre,
            $clave
        ]);

        if ($sql == 1) {
            return back()->with("correcto", "Usuario Registrado");
        } else {
            return back()->with("incorrecto", "Error al registrar");
        }
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
        $sql = DB::select('select * from usuario where id=?', [
            $id
        ]);

        return view('usuarios/modificar')->with("sql", $sql);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request)
    {
        $clave = md5($request->password);
        try {
            $sql = DB::update('update usuario set usuario=?,ape_nom=?,password=? where id=?', [
                $request->usuario,
                $request->nombre,
                $clave,
                $request->id
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }


        if ($sql == 1) {
            return back()->with("correcto", "Usuario Modificado");
        } else {
            return back()->with("incorrecto", "Error al Modificar");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sql = DB::delete('delete from usuario where id=?', [
            $id
        ]);

        if ($sql == 1) {
            return back()->with("correcto", "Usuario Eliminado");
        } else {
            return back()->with("incorrecto", "Error al Eliminar");
        }
    }

    public function buscar(Request $request)
    {
        $sql = DB::select('select * from usuario where usuario=?', [
            $request->usuario
        ]);

        if ($sql != null) {
            return back()->with("sql2", $sql);
        } else {
            return back()->with("buscar", "No se Encontraron Registros");
        }
    }
}
