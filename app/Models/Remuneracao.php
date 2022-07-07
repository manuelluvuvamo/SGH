<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Remuneracao extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'idFuncionario',
        'salario_base',
        'salario_liquido',
        'tipo',
        'status'
    ];
    protected $dates=['deleted_at'];
}
