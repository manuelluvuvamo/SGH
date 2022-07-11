<div class="form-group col-sm-4">
    <label for="idFuncionario">{{ __('Funcionário') }}</label>
    <select type="text" class="form-control border-secondary" name="idFuncionario" id="idFuncionario" required>
        @isset($avaliacao)
            <option value="{{ isset($avaliacao->idFuncionario) ? $avaliacao->idFuncionario : '' }}">
                {{ $avaliacao->nome }}</option>
        @else
            <option disabled value="" selected>selecione o Funcionário</option>
        @endisset
        @if (isset($funcionarios))

            @foreach ($funcionarios as $funcionario)
                <option value="{{$funcionario->id}}">
                    {{ $funcionario->nome }}
                </option>
            @endforeach
            
        @else
             <option disabled value="" selected>não existem funcionários cadastrados</option>
        @endif
       
    </select>
</div>



<div class="form-group col-sm-4">
    <label for="idCriterio">{{ __('Criterio de Avaliação') }}</label>
    <select type="text" class="form-control border-secondary" name="idCriterio" id="idCriterio" onchange="selecionar()" 
        {{isset($avaliacao) ? '': 'required'}}>
            <option disabled value="" selected>Selecione o Criterio de Avaliação</option>
        @if (isset($criterios))

            @foreach ($criterios as $criterio)
                <option value="{{$criterio->id}}">
                    {{$criterio->nome}}
                </option>
            @endforeach
            
        @else
             <option disabled value="" selected>não existem Criterios de Avaliações cadastrados</option>
        @endif
       
    </select>
</div>
