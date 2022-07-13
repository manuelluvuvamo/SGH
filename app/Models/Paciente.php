<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'nome',
        'dataNascimento',
        'estadoCivil',
        'nacionalidade',
        'numBI',
        'email',
        'telefone',
        'endereco',
        'status',
    ];
    protected $dates=['deleted_at'];
}
