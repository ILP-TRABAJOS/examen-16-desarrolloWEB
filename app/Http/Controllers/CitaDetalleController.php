<?php

namespace App\Http\Controllers;

use App\Http\Requests\CitaDetalleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitaDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('citas_detalle/table')->with("sql", $sql);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sql1 = DB::select("select * from cita");
        $sql2 = DB::select('select * from consulta');
        return view('citas_detalle/crear')->with("sql1", $sql1)->with('consulta', $sql2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CitaDetalleRequest $request)
    {
        $sql = DB::insert('insert into cita_detalle(id_cita,id_consulta,precio,total)values(?,?,?,?)', [
            $request->cita,
            $request->consulta,
            $request->precio,
            $request->total
        ]);

        if ($sql == 1) {
            return back()->with("correcto", "CitaDetalle Registrado");
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
        $sql1 = DB::select("select * from cita");
        $sql2 = DB::select('select * from consulta');

        $sql3 = DB::select("select * from cita");
        $sql = DB::select('select * from cita_detalle where id_cita_detalle=?', [
            $id
        ]);

        return view('citas_detalle/modificar')->with("sql", $sql)->with("sql3", $sql3)->with('sql1', $sql1)->with('sql2', $sql2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CitaDetalleRequest $request)
    {
        try {
            $sql = DB::update('update cita_detalle set id_cita=?, id_consulta=?, precio=?, total=? where id_cita_detalle=?', [
                $request->cita,
                $request->consulta,
                $request->precio,
                $request->total,
                $request->id
            ]);
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }


        if ($sql == 1) {
            return back()->with("correcto", "CitaDetalle Modificado");
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
        $sql = DB::delete('delete from cita_detalle where id_cita_detalle=?', [
            $id
        ]);

        if ($sql == 1) {
            return back()->with("correcto", "CitaDetalle Eliminado");
        } else {
            return back()->with("incorrecto", "Error al Eliminar");
        }
    }
    function busquedaConsulta($id)
    {
        $sql = DB::select('select precio from consulta where id_consulta=? ', [$id]);
        foreach ($sql as $item) {
            $consulta = $item->precio;
        }

        return response()->json(['dato' => $consulta, 200]); //RETORNA UN JSON
    }
}
