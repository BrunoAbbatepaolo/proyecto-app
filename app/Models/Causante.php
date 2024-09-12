<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causante extends Model
{
    use HasFactory;
    protected $connection = "pgsql_mitiv";
    protected $table = "causantes";
    protected $fillable = [
        'nombre',
    ];
}
