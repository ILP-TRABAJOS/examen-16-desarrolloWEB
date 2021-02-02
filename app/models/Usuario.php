<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    public $table = "usuario";
    public $primaryKey = "id_usuario";
    public $timestamps = false;

    public $fillable=[
        "ape_nom",
        "dni",
        "celular"
    ];

}
