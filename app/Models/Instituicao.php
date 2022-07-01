<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instituicao extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'nomeCurto',
        'nomeLongo',
        'logo',
        'missao',
        'iban',
        'nif',
        'telefone1',
        'telefone2',
        'email1',
        'email2',
        'endereco',
    ];
    protected $dates=['deleted_at'];
}
