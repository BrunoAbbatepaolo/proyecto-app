<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpMitiv extends Model
{
    use HasFactory;
    protected $connection = "pgsql_mitiv";
    protected $table = "expedientes";
    protected $fillable = [
        'numero',
        'fecha',
        'folio',
        'asunto',
        'causante_id',
        'asunto_id',
    ];
}
