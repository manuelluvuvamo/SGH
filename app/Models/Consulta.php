<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Consulta extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = [
        'id',
        'idPaciente',
        'idFuncionario',
        'idMarcacao',
        'descricao',
        'diagnostico',
        'status',
    ];
    protected $dates=['deleted_at'];
}
