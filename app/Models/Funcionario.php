<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Funcionario extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'idUser',
        'idFuncao',
        'nome',
        'foto',
        'genero',
        'dataNascimento',
        'estadoCivil',
        'localNascimento',
        'nacionalidade',
        'numBi',
        'filPai',
        'filMae',
        'iban',
        'endereco',
        'telefone',
        'status',
    ];
    protected $dates=['deleted_at'];
}
