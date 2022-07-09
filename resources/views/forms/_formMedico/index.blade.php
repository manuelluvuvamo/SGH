  <!-- Custom Styled Validation -->
  <div class="col-md-4">
    <label for="idFuncionario" class="form-label">Funcionário</label>
    <select class="form-select @error('idFuncionario') is-invalid @enderror" id="idFuncionario"  name="idFuncionario" value="old('idFuncionario')" required>
    
      <option value="{{ isset($medico) ? $medico->idFuncionario : '0' }}"  {{isset($func)?'':'selected'}}>
        {{ isset($medico) ? $medico->nome_funcionario : 'Seleccionar funcionario' }}
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
    <label for="idEspecialidade" class="form-label">Especialidade</label>
    <select class="form-select @error('idEspecialidade') is-invalid @enderror" id="idEspecialidade"  name="idEspecialidade" value="old('idEspecialidade')" required>
    
      <option value="{{ isset($medico) ? $medico->idEspecialidade : '0' }}" selected>
        {{ isset($medico) ? $medico->nome_especialidade : 'Seleccionar especialidade' }}
    </option>
      
      @isset($especialidades)
      @foreach ($especialidades as $especialidade)
      <option value="{{$especialidade->id}}">{{$especialidade->nome}}</option>
      @endforeach
          
      @endisset
     
     
     
    </select>
    @error('idEspecialidade')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
    

    <div class="col-md-4">
      <label for="paisOrdem" class="form-label">País de ordem</label>
      <input type="text" name="paisOrdem" class="form-control @error('paisOrdem') is-invalid @enderror" id="paisOrdem" value="{{isset($medico->paisOrdem)?$medico->paisOrdem:old('paisOrdem')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('paisOrdem')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="numOrdem" class="form-label">Nº de ordem</label>
      <input type="text" name="numOrdem" class="form-control @error('numOrdem') is-invalid @enderror" id="numOrdem" value="{{isset($medico->numOrdem)?$medico->numOrdem:old('numOrdem')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('numOrdem')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

   


   
  
 <!-- End Custom Styled Validation -->
