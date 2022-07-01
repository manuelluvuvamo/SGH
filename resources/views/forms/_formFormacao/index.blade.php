  <!-- Custom Styled Validation -->
 
  <div class="col-md-4">
    <label for="idFuncionario" class="form-label">Funcionário</label>
    <select class="form-select @error('idFuncionario') is-invalid @enderror" id="idFuncionario"  name="idFuncionario" value="old('idFuncionario')" required>
    
      <option value="{{ isset($formacao) ? $formacao->idFuncionario : '0' }}"  {{isset($func)?'':'selected'}}>
        {{ isset($formacao) ? $formacao->nome_funcionario : 'Seleccionar funcionario' }}
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
      <input type="text" name="instituicao" class="form-control @error('instituicao') is-invalid @enderror" id="instituicao" value="{{isset($formacao->instituicao)?$formacao->instituicao:old('instituicao')}}" required>
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
      <label for="curso" class="form-label">Curso</label>
      <input type="text" name="curso" class="form-control @error('curso') is-invalid @enderror" id="curso" value="{{isset($formacao->curso)?$formacao->curso:old('curso')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('curso')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="nivel" class="form-label">Nível</label>
      <input type="text" name="nivel" class="form-control @error('nivel') is-invalid @enderror" id="nivel" value="{{isset($formacao->nivel)?$formacao->nivel:old('nivel')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('nivel')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="dataInicio" class="form-label">Data de início</label>
      <input type="date" name="dataInicio" class="form-control @error('dataInicio') is-invalid @enderror" id="dataInicio" value="{{isset($formacao->dataInicio)?$formacao->dataInicio:old('dataInicio')}}" required>
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
      <input type="date" name="dataFim" class="form-control @error('dataFim') is-invalid @enderror" id="dataFim" value="{{isset($formacao->dataFim)?$formacao->dataFim:old('dataFim')}}" required>
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
