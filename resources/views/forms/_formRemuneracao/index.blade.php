  <!-- Custom Styled Validation -->
 
  <div class="col-md-4">
    <label for="idFuncionario" class="form-label">Funcionário</label>
    <select class="form-select @error('idFuncionario') is-invalid @enderror" id="idFuncionario"  name="idFuncionario" value="old('idFuncionario')" required>
    
      <option value="{{ isset($remuneracao) ? $remuneracao->idFuncionario : '0' }}"  {{isset($func)?'':'selected'}}>
        {{ isset($remuneracao) ? $remuneracao->nome_funcionario : 'Seleccionar funcionario' }}
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
      <label for="salario_base" class="form-label">Salário base</label>
      <input type="number" step="0.00000000001" min="0" name="salario_base" class="form-control @error('salario_base') is-invalid @enderror" id="salario_base" value="{{isset($remuneracao->salario_base)?$remuneracao->salario_base:old('salario_base')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('salario_base')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="salario_liquido" class="form-label">Salário líquido</label>
      <input type="number" step="0.00000000001" min="0" name="salario_liquido" class="form-control @error('salario_liquido') is-invalid @enderror" id="salario_liquido" value="{{isset($remuneracao->salario_liquido)?$remuneracao->salario_liquido:old('salario_liquido')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('salario_liquido')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="tipo" class="form-label">Tipo</label>
      <input type="text" name="tipo" class="form-control @error('tipo') is-invalid @enderror" id="tipo" value="{{isset($remuneracao->tipo)?$remuneracao->tipo:old('tipo')}}" >
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('tipo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    

   

   
   
  
 <!-- End Custom Styled Validation -->
