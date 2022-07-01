<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instituicao;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;


class InstituicaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Instituicao::class;
    public function definition()
    {
        return [
            //
            'nomeCurto'=>"SGH",
                'nomeLongo'=>"Sistema de Gestão Hospitalar",
                'logo'=>" ",
                'missao'=>" ",
                'iban'=>"",
                'nif'=>"00000000",
                'telefone1'=>"",
                'telefone2'=>"",
                'email1'=>"geral@sgh.com",
                'email2'=>"",
                'endereco'=>"",
        ];
    }
}
