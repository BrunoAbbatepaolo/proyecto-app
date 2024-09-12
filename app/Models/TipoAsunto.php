<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAsunto extends Model
{
    use HasFactory;
    protected $connection = "pgsql_mitiv";
    protected $table = "tipo_asuntos";
    protected $fillable = [
        'nombre',
        'habilitado',
    ];
}
