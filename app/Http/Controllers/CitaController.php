<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = DB::select("SELECT
        cita.id_cita,
        cita.id_paciente,
        cita.fecha_cita,
        cita.id_doctor,
        doctor.id_doctor as 'nom_doctor',
        doctor.ape_nom as 'doctor',
        doctor.especialidad,
        paciente.id_paciente as 'id_pac',
        paciente.ape_nom 'paciente',
        paciente.celular
        FROM
        cita
        INNER JOIN doctor ON cita.id_doctor = doctor.id_doctor
        INNER JOIN paciente ON cita.id_paciente = paciente.id_paciente");
        return view('citas/table')->with("sql", $sql);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sql_12 = DB::select('select * from consulta');

        $sql = DB::select("select * from paciente");
        $sql1 = DB::select("select * from doctor");
        $sql2 = DB::select("select * from consulta");
        return view('citas/crear')->with("sql", $sql)->with("sql1", $sql1)->with("sql2", $sql2)
            ->with('consulta', $sql_12);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitaRequest $request)
    {
        $sql = DB::insert('insert into cita(id_paciente,fecha_cita,id_doctor)values(?,?,?)', [
            $request->paciente,
            $request->fecha,
            $request->doctor
        ]);

        $sql2 = DB::select('select * from cita where id_cita=(SELECT max(id_cita) from cita)');
        foreach ($sql2 as $value) {
            $id_cita = $value->id_cita;
        }

        $sql3 = DB::insert('insert into cita_detalle(id_cita,id_consulta,precio,total)values(?,?,?,?)', [
            $id_cita,
            $request->consulta,
            $request->precio,
            $request->total,
        ]);




        if ($sql == 1 && $sql3 == 1) {
            //return 1;
            return back()->with("correcto", "Cita Registrado");
        } else {
            //return 0;
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
        $sql2 = DB::select("select * from paciente");
        $sql3 = DB::select("select * from doctor");

        $sql = DB::select('select * from cita where id_cita=?', [
            $id
        ]);

        return view('citas/modificar')->with("sql", $sql)->with("sql2", $sql2)->with("sql3", $sql3);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitaRequest $request)
    {
        try {
            $sql = DB::update('update cita set id_paciente=? ,fecha_cita=?,id_doctor=? where id_cita=?', [
                $request->paciente,
                $request->fecha,
                $request->doctor,
                $request->id
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }


        if ($sql == 1) {
            return back()->with("correcto", "Cita Modificado");
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
        try {
            $sql = DB::delete('delete from cita where id_cita=?', [
                $id
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }

        if ($sql == 1) {
            return back()->with("correcto", "Cita Eliminado");
        } else {
            return back()->with("incorrecto", "Error al Eliminar");
        }
    }
}
