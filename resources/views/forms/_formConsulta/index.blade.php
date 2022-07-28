  <!-- Custom Styled Validation -->





  <div class="col-md-4">
    <label for="idPaciente" class="form-label">Paciente</label>
    <select class="form-select @error('idPaciente') is-invalid @enderror" id="idPaciente"  name="idPaciente" value="old('idPaciente')" required>
    
      <option value="{{ isset($consulta) ? $consulta->idPaciente : '0' }}"  {{isset($pac)?'':'selected'}}>
        {{ isset($consulta) ? $consulta->nome_paciente : 'Seleccionar paciente' }}
    </option>
      
      @isset($pacientes)
      @foreach ($pacientes as $paciente)
      <option value="{{$paciente->id}}" {{isset($pac)?'selected':''}} >{{$paciente->nome}}</option>
      @endforeach
          
      @endisset
     
     
     
    </select>
    @error('idPaciente')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>


  <div class="col-md-4">
    <label for="idFuncionario" class="form-label">Funcionário</label>
    <select class="form-select @error('idFuncionario') is-invalid @enderror" id="idFuncionario"  name="idFuncionario" value="old('idFuncionario')" required>
    
      <option value="{{ isset($consulta) ? $consulta->idFuncionario : '0' }}"  {{isset($func)?'':'selected'}}>
        {{ isset($consulta) ? $consulta->nome_funcionario : 'Seleccionar funcionario' }}
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
      <label for="idMarcacao" class="form-label">Marcação</label>
      <select class="form-select @error('idMarcacao') is-invalid @enderror" id="idMarcacao"  name="idMarcacao" value="old('idMarcacao')" required>
      
        <option value="{{ isset($consulta) ? $consulta->idMarcacao : '0' }}"  {{isset($marc)?'':'selected'}}>
          {{ isset($consulta) ? $consulta->data." - ".$consulta->hora  : 'Seleccionar marcionario' }}
      </option>
        
        @isset($marcacaos)
        @foreach ($marcacaos as $marcacao)
        <option value="{{$marcacao->id}}" {{isset($marc)?'selected':''}} >{{$marcacao->data}} - {{$marcacao->hora}}</option>
        @endforeach
            
        @endisset
       
       
       
      </select>
      @error('idMarcacao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>


    


    <div class="col-md-12">
    <label for="descricao" class="form-label">Descrição</label>

      <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" cols="30" rows="10" style="height: 120px;">{{ isset($consulta) ? $consulta->descricao : '' }}</textarea>
  
    @error('descricao')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <label for="diagnostico" class="form-label">Diagnóstico</label>

      <textarea name="diagnostico" id="diagnostico" class="form-control @error('diagnostico') is-invalid @enderror" cols="30" rows="10" style="height: 120px;">{{ isset($consulta) ? $consulta->diagnostico : '' }}</textarea>
  
    @error('diagnostico')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

 

   
  
 <!-- End Custom Styled Validation -->
