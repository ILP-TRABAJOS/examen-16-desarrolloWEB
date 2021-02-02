<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaDetallePdfController extends Controller
{
    public function index()
    {
        /* METODO 2 */
        $sql = DB::select("SELECT
        cita_detalle.id_cita_detalle,
        cita_detalle.id_cita,
        cita_detalle.id_consulta,
        consulta.descripcion,
        cita_detalle.precio,
        cita_detalle.total,
        cita.fecha_cita,
        doctor.ape_nom,
        paciente.ape_nom as 'paciente'
        FROM
        cita_detalle
        INNER JOIN consulta ON cita_detalle.id_consulta = consulta.id_consulta
        INNER JOIN cita ON cita_detalle.id_cita = cita.id_cita
        INNER JOIN doctor ON cita.id_doctor = doctor.id_doctor
        INNER JOIN paciente ON cita.id_paciente = paciente.id_paciente      
        ");
        $pdf = \App::make('dompdf.wrapper');
        //$pdf->setPaper('a4', 'landscape');//FORMATO HORIZONTAL
        $pdf->loadView('reportes.cita_detalle', compact('sql', $sql));
        return $pdf->stream();
    }
    public function ticket($id)
    {
        /* METODO 2 */
        $sql = DB::select("SELECT
        cita_detalle.id_cita_detalle,
        cita_detalle.id_cita,
        cita_detalle.id_consulta,
        consulta.descripcion,
        cita_detalle.precio,
        cita_detalle.total,
        cita.fecha_cita,
        doctor.ape_nom,
        paciente.ape_nom as 'paciente'
        FROM
        cita_detalle
        INNER JOIN consulta ON cita_detalle.id_consulta = consulta.id_consulta
        INNER JOIN cita ON cita_detalle.id_cita = cita.id_cita
        INNER JOIN doctor ON cita.id_doctor = doctor.id_doctor
        INNER JOIN paciente ON cita.id_paciente = paciente.id_paciente where id_cita_detalle=?", [$id]);
        $pdf = \App::make('dompdf.wrapper');
        //$pdf->setPaper('a4', 'landscape');//FORMATO HORIZONTAL
        $pdf->loadView('reportes.ticket_paciente', compact('sql', $sql));
        return $pdf->stream();
    }
    public function boleta($id)
    {
        /* METODO 2 */
        $sql = DB::select("SELECT
        cita_detalle.id_cita_detalle,
        cita_detalle.id_cita,
        cita_detalle.id_consulta,
        consulta.descripcion,
        cita_detalle.precio,
        cita_detalle.total,
        cita.fecha_cita,
        doctor.ape_nom,
        paciente.ape_nom as 'paciente'
        FROM
        cita_detalle
        INNER JOIN consulta ON cita_detalle.id_consulta = consulta.id_consulta
        INNER JOIN cita ON cita_detalle.id_cita = cita.id_cita
        INNER JOIN doctor ON cita.id_doctor = doctor.id_doctor
        INNER JOIN paciente ON cita.id_paciente = paciente.id_paciente where id_cita_detalle=?", [$id]);
        $pdf = \App::make('dompdf.wrapper');
        //$pdf->setPaper('a4', 'landscape');//FORMATO HORIZONTAL
        $pdf->loadView('reportes.boleta_paciente', compact('sql', $sql));
        return $pdf->stream();
    }
}
