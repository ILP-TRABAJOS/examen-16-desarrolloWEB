<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = DB::select('select * from doctor');
        return view('doctors/table')->with("sql", $sql);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $sql = DB::insert('insert into doctor(ape_nom,dni,especialidad)values(?,?,?)', [
            $request->nombre,
            $request->dni,
            $request->especialidad
        ]);

        if ($sql == 1) {
            return back()->with("correcto", "Doctor Registrado");
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
        $sql = DB::select('select * from doctor where id_doctor=?', [
            $id
        ]);

        return view('doctors/modificar')->with("sql", $sql);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request)
    {
        try {
            $sql = DB::update('update doctor set ape_nom=?, dni=?, especialidad=? where id_doctor=?', [
                $request->nombre,
                $request->dni,
                $request->especialidad,
                $request->id
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }


        if ($sql == 1) {
            return back()->with("correcto", "Doctor Modificado");
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
        $sql = DB::delete('delete from doctor where id_doctor=?', [
            $id
        ]);

        if ($sql == 1) {
            return back()->with("correcto", "Doctor Eliminado");
        } else {
            return back()->with("incorrecto", "Error al Eliminar");
        }
    }

    public function buscar(Request $request)
    {
        $sql = DB::select('select * from doctor where dni=?', [           
            $request->dni
        ]);

        if ($sql != null) {
            return back()->with("sql2", $sql);
        } else {
            return back()->with("buscar", "No se Encontraron Registros");
        }
    }
}
