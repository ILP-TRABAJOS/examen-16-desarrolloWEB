<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function index()
    {
        $sql = DB::select('select * from consulta');
        return view('consultas.index', compact("sql", $sql));
    }

    public function show()
    {
    }

    public function create()
    {
        return view('consultas.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "desc" => "required"
        ]);
        $sql = DB::insert('insert into consulta(descripcion,precio)values(?,?)', [$request->desc, $request->precio]);
        if ($sql == 1) {
            return back()->with("correcto", "Consulta Agregada Exitosamente");
        } else {
            return back()->with("incorrecto", "Error al Agregar Consulta");
        }
    }

    public function edit($id)
    {
        $sql = DB::select('select * from consulta where id_consulta=?', [$id]);
        return view('consultas.edit', compact("sql"));
    }

    public function update(Request $request)
    {
        $request->validate([
            "desc" => "required"
        ]);

        try {
            $sql = DB::update(
                'update consulta set descripcion=?, precio=? where id_consulta=?',
                [$request->desc, $request->precio, $request->id]
            );
        } catch (\Throwable $th) {
        }
        if ($sql == 0) {
            $sql = 1;
        }
        if ($sql == 1) {
            return back()->with("correcto", "Consulta Modificado Exitosamente");
        } else {
            return back()->with("incorrecto", "Error al Modificar Consulta");
        }
    }

    public function delete($id)
    {
        try {
            $sql = DB::delete('delete from consulta where id_consulta=?', [$id]);
        } catch (\Throwable $th) {
        }
        if ($sql == 0) {
            $sql = 1;
        }
        if ($sql == 1) {
            return back()->with("correcto", "Consulta Eliminado Exitosamente");
        } else {
            return back()->with("incorrecto", "Error al Eliminar Consulta");
        }
    }
}
