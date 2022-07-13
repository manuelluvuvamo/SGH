<div class="form-group col-sm-4">
    <label for="idCriterio">{{ __('Criterio de Avaliação') }}</label>
    <select type="text" class="form-control border-secondary" name="avaliacao[{{$numero}}][idCriterio]" disabled required>
        @isset($avaliacao)
            <option value="{{ isset($avaliacao->idCriterio) ? $avaliacao->idCriterio : '' }}">
                {{ $avaliacao->criterio }}</option>
        @else
            <option disabled value="" selected>Selecione o Criterio de Avaliação</option>
        @endisset
        @if (isset($criterios))

            @foreach ($criterios as $criterio)
                <option value="{{$criterio->id}}">{{$criterio->nome}}</option>
            @endforeach
            
        @else
             <option disabled value="" selected>não existem Criterios de Avaliações cadastrados</option>
        @endif
       
    </select>
</div>

<div class="form-group col-sm-4">
    <label for="descricao" class="form-label">Descrição</label>
    <input type="text" class="form-control" placeholder="Digite a descrição" name="avaliacao[{{$numero}}][descricao]"
        value="{{ isset($avaliacao->descricao) ? $avaliacao->descricao : '' }}" required>
</div>

<div class="form-group col-sm-3">
    <label for="idNivel">{{ __('Nivel de Avaliação') }}</label>
    <select type="text" class="form-control border-secondary" name="avaliacao[{{$numero}}][idNivel]" required>
        @isset($avaliacao)
            <option value="{{ isset($avaliacao->idNivel) ? $avaliacao->idNivel : '' }}">
                {{ $avaliacao->nivel }}</option>
        @else
            <option disabled value="" selected>Selecione o Nivel de Avaliação</option>
        @endisset
        @if (isset($nivels))

            @foreach ($nivels as $nivel)
                <option value="{{$nivel->id}}">{{$nivel->nome}}</option>
            @endforeach
            
        @else
             <option disabled value="" selected>não existem Niveis de Avaliações cadastrados</option>
        @endif
       
    </select>
</div>

<div class=" col-sm-1 ">
    <i style="color:#003B76" class="fas fa-times fa-lg"
    id="remover{{ $numero }}" onclick="remover(div{{ $numero }})"
    ></i>
</div>