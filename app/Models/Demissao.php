<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demissao extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'idFuncionario',
        'motivo',
        'descricao',
        'status'
    ];
    protected $dates=['deleted_at'];
}
