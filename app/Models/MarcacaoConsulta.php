<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarcacaoConsulta extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'idPaciente',
        'idEspecialidade',
        'descricao',
        'data',
        'hora',
        'status',
    ];
    protected $dates=['deleted_at'];
}
