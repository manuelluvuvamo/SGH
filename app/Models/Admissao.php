<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admissao extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'idFuncionario',
        'dataAdmissao',
        'cargoInicial',
        'salarioInicia',
        'numDependentes',
        'numRegistro',
        'status'
    ];
    protected $dates=['deleted_at'];
}
