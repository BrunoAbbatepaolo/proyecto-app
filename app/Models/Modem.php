<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modem extends Model
{
    use HasFactory;
    protected $table= "modem";
    protected $fillable = [
        'modelo',
        'red',
        'clave',
        'ip',
        'proxy',
    ];

}


