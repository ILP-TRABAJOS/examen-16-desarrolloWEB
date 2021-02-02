<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = DB::select('select * from paciente');
        return view('pacientes/table')->with("sql", $sql);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteRequest $request)
    {
        $sql = DB::insert('insert into paciente(ape_nom,dni,celular)values(?,?,?)', [
            $request->nombre,
            $request->dni,
            $request->celular
        ]);

        if ($sql == 1) {
            return back()->with("correcto", "Paciente Registrado");
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
        $sql = DB::select('select * from paciente where id_paciente=?', [
            $id
        ]);

        return view('pacientes/modificar')->with("sql", $sql);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteRequest $request)
    {
        try {
            $sql = DB::update('update paciente set ape_nom=?, dni=?, celular=? where id_paciente=?', [
                $request->nombre,
                $request->dni,
                $request->celular,
                $request->id
            ]);
            if ($sql==0) {
                $sql=1;
            } 
            
        } catch (\Throwable $th) {
            //throw $th;
        }


        if ($sql == 1) {
            return back()->with("correcto", "Paciente Modificado");
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
        $sql = DB::delete('delete from paciente where id_paciente=?', [           
            $id
        ]);

        if ($sql == 1) {
            return back()->with("correcto", "Paciente Eliminado");
        } else {
            return back()->with("incorrecto", "Error al Eliminar");
        }
    }

    public function buscar(Request $request)
    {
        
        $sql = DB::select('select * from paciente where dni=?', [           
            $request->dni
        ]);

        if ($sql != null) {
            return back()->with("sql2", $sql);
        } else {
            return back()->with("buscar", "No se Encontraron Registros");
        }
    }
}
