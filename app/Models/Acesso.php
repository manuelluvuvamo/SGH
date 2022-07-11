<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acesso extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'idFuncionario',
        'idUser',
        'idDepartamento',
        'idFuncao',
        'menu',
        'nivel',
        'status'
    ];
    protected $dates=['deleted_at'];
}
