<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Avaliacao extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'descricao',
        'idCriterio',
        'idNivel',
        'idUser',
        'idFuncionario',
        'idCodigo',
        'status',
    ];
    protected $dates=['deleted_at'];
}
