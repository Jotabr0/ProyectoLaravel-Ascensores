<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;

    protected $table = 'cuotas';
    protected $fillable = [
        'concepto',
        'fecha_emision',
        'importe',
        'pagada',
        'fecha_pago',
        'notas',
        'cliente_id'
    ];

    public static function getAllCuotas()
    {
        // return Tarea::all();
        //return static::query();
        //return Cuota::orderBy('created_at', 'desc');

        return Cuota::query()
        ->orderBy('created_at', 'desc');
    }
}
