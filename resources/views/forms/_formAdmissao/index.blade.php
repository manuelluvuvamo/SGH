  <!-- Custom Styled Validation -->
 
  <div class="col-md-4">
    <label for="idFuncionario" class="form-label">Funcionário</label>
    <select class="form-select @error('idFuncionario') is-invalid @enderror" id="idFuncionario"  name="idFuncionario" value="old('idFuncionario')" required>
    
      <option value="{{ isset($admissao) ? $admissao->idFuncionario : '0' }}"  {{isset($func)?'':'selected'}}>
        {{ isset($admissao) ? $admissao->nome_funcionario : 'Seleccionar funcionario' }}
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
      <label for="dataAdmissao" class="form-label">Data de admissão</label>
      <input type="date" name="dataAdmissao" class="form-control @error('dataAdmissao') is-invalid @enderror" id="dataAdmissao" value="{{isset($admissao->dataAdmissao)?$admissao->dataAdmissao:old('dataAdmissao')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('dataAdmissao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="cargoInicial" class="form-label">Cargo inicial</label>
      <input type="text" name="cargoInicial" class="form-control @error('cargoInicial') is-invalid @enderror" id="cargoInicial" value="{{isset($admissao->cargoInicial)?$admissao->cargoInicial:old('cargoInicial')}}" >
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('cargoInicial')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="salarioInicia" class="form-label">Salário Inicial</label>
      <input type="number" min="0" step="0.0000000001" name="salarioInicia" class="form-control @error('salarioInicia') is-invalid @enderror" id="salarioInicia" value="{{isset($admissao->salarioInicia)?$admissao->salarioInicia:old('salarioInicia')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('salarioInicia')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="numDependentes" class="form-label">Número de dependentes</label>
      <input type="number" name="numDependentes" class="form-control @error('numDependentes') is-invalid @enderror" id="numDependentes" value="{{isset($admissao->numDependentes)?$admissao->numDependentes:old('numDependentes')}}" >
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('numDependentes')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="numRegistro" class="form-label">Número de registro</label>
      <input type="number" min="0" name="numRegistro" class="form-control @error('numRegistro') is-invalid @enderror" id="numRegistro" value="{{isset($admissao->numRegistro)?$admissao->numRegistro:old('numRegistro')}}" >
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('numRegistro')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

   

   
   
  
 <!-- End Custom Styled Validation -->
