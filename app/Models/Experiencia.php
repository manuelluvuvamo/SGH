<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experiencia extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'idFuncionario',
        'instituicao',
        'cargo',
        'funcao',
        'dataInicio',
        'dataFim',
        'status'
    ];
    protected $dates=['deleted_at'];
}
