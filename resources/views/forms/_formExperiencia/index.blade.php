  <!-- Custom Styled Validation -->
 
  <div class="col-md-4">
    <label for="idFuncionario" class="form-label">Funcionário</label>
    <select class="form-select @error('idFuncionario') is-invalid @enderror" id="idFuncionario"  name="idFuncionario" value="old('idFuncionario')" required>
    
      <option value="{{ isset($experiencia) ? $experiencia->idFuncionario : '0' }}"  {{isset($func)?'':'selected'}}>
        {{ isset($experiencia) ? $experiencia->nome_funcionario : 'Seleccionar funcionario' }}
    </option>
      
      @isset($funcionarios)
      @foreach ($funcionarios as $funcionario)
      <option value="{{$funcionario->id}}" {{isset($func)?'selected':''}} >{{$funcionario->nome}}</option>
      @endforeach
          
      @endisset
     
     
     
    </select>
    @error('idFuncionario')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

    <div class="col-md-4">
      <label for="instituicao" class="form-label">Instituicao</label>
      <input type="text" name="instituicao" class="form-control @error('instituicao') is-invalid @enderror" id="instituicao" value="{{isset($experiencia->instituicao)?$experiencia->instituicao:old('instituicao')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('instituicao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="cargo" class="form-label">Cargo</label>
      <input type="text" name="cargo" class="form-control @error('cargo') is-invalid @enderror" id="cargo" value="{{isset($experiencia->cargo)?$experiencia->cargo:old('cargo')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('cargo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="funcao" class="form-label">Função</label>
      <input type="text" name="funcao" class="form-control @error('funcao') is-invalid @enderror" id="funcao" value="{{isset($experiencia->funcao)?$experiencia->funcao:old('funcao')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('funcao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="dataInicio" class="form-label">Data de início</label>
      <input type="date" name="dataInicio" class="form-control @error('dataInicio') is-invalid @enderror" id="dataInicio" value="{{isset($experiencia->dataInicio)?$experiencia->dataInicio:old('dataInicio')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('dataInicio')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="dataFim" class="form-label">Data de término</label>
      <input type="date" name="dataFim" class="form-control @error('dataFim') is-invalid @enderror" id="dataFim" value="{{isset($experiencia->dataFim)?$experiencia->dataFim:old('dataFim')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('dataFim')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

   

   
   
  
 <!-- End Custom Styled Validation -->
