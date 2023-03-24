<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Tbl_Catalogo extends Model 
{


    use HasFactory;
    protected $primaryKey = 'id_catalogo';
    public $table = "tbl_catalogo";

    protected $fillable = [
        'estado',
        'nombrep',
        'precio',
        'contenido_neto',
        'foto',
        'usuario_id',
    ];
}
