<?php

namespace App\Models\experience;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'experiences';
    protected $primarykey = 'id';
    protected  $fillable = [
        'cargo',
        'tipo_empleo',
        'nombre_empresa',
        'ubicacion',
        'tipo_ubicacion',
        'date_init',
        'date_finish',
        'description',
        'color',
    ];
}
