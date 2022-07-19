<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoricoClinico extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'idPaciente',
        'idPatologia',
        'descricao',
        'resultado',
        'status',
    ];
    protected $dates=['deleted_at'];
}
