<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedaController extends Controller
{
    public function index()
    {
        $sql = DB::select("select * from consulta");
        $sql4 = DB::select("select * from paciente");
        return view('busquedas.index')->with("sql2", $sql)->with("sql4", $sql4);
    }
    public function busqueda($valor)
    {
        //return $valor;
        $sql = DB::select("SELECT
        cita_detalle.id_cita_detalle,
        cita_detalle.id_cita,
        cita_detalle.id_consulta,
        consulta.descripcion,
        cita.fecha_cita,
        doctor.ape_nom,
        paciente.ape_nom as 'paciente'
        FROM
        cita_detalle
        INNER JOIN consulta ON cita_detalle.id_consulta = consulta.id_consulta
        INNER JOIN cita ON cita_detalle.id_cita = cita.id_cita
        INNER JOIN doctor ON cita.id_doctor = doctor.id_doctor
        INNER JOIN paciente ON cita.id_paciente = paciente.id_paciente
        where cita_detalle.id_consulta=?", [$valor]);
        return response()->json(['dato' => $sql, 200]);
    }
    public function busquedaPaciente($valor){
        $sql = DB::select("SELECT
        cita_detalle.id_cita_detalle,
        cita_detalle.id_cita,
        cita_detalle.id_consulta,
        consulta.descripcion,
        cita.fecha_cita,
        doctor.ape_nom,
        paciente.ape_nom as 'paciente'
        FROM
        cita_detalle
        INNER JOIN consulta ON cita_detalle.id_consulta = consulta.id_consulta
        INNER JOIN cita ON cita_detalle.id_cita = cita.id_cita
        INNER JOIN doctor ON cita.id_doctor = doctor.id_doctor
        INNER JOIN paciente ON cita.id_paciente = paciente.id_paciente
        where paciente.ape_nom like '%$valor%' ");
        return response()->json(['dato' => $sql, 200]);
    }

    public function busquedaPacienteDni($valor){
        $sql = DB::select("SELECT
        cita_detalle.id_cita_detalle,
        cita_detalle.id_cita,
        cita_detalle.id_consulta,
        consulta.descripcion,
        cita.fecha_cita,
        doctor.ape_nom,
        paciente.ape_nom as 'paciente',
				paciente.dni as 'dni'
        FROM
        cita_detalle
        INNER JOIN consulta ON cita_detalle.id_consulta = consulta.id_consulta
        INNER JOIN cita ON cita_detalle.id_cita = cita.id_cita
        INNER JOIN doctor ON cita.id_doctor = doctor.id_doctor
        INNER JOIN paciente ON cita.id_paciente = paciente.id_paciente
        where paciente.dni like '%$valor%' ");
        return response()->json(['dato' => $sql, 200]);
    }
}
