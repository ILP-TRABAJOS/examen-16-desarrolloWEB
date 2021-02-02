<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table="consulta";
    protected $primaryKey="id_consulta";
    protected $timestamps=false;
    protected $fillable=[
        "descripcion"
    ];
}
