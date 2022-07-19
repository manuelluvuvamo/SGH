  <!-- Custom Styled Validation -->
 
  <div class="col-md-6">
    <label for="idPaciente" class="form-label">Paciente</label>
    <select class="form-select @error('idPaciente') is-invalid @enderror" id="idPaciente"  name="idPaciente" value="old('idPaciente')" required {{isset($paci)?'readonly':''}}>
    
      <option value="{{ isset($historico_clinico) ? $historico_clinico->idPaciente : '0' }}"  {{isset($paci)?'':'selected'}}>
        {{ isset($historico_clinico) ? $historico_clinico->nome_paciente : 'Seleccionar paciente' }}
    </option>
      
      @isset($pacientes)
      @foreach ($pacientes as $paciente)
      <option value="{{$paciente->id}}" {{isset($paci)?'selected':''}} >{{$paciente->nome}}</option>
      @endforeach
          
      @endisset
     
     
     
    </select>
    @error('idPaciente')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <div class="col-md-6">
    <label for="idPatologia" class="form-label">Patologia</label>
    <select class="form-select @error('idPatologia') is-invalid @enderror" id="idPatologia"  name="idPatologia" value="old('idPatologia')" required>
    
      <option value="{{ isset($historico_clinico) ? $historico_clinico->idPatologia : '0' }}" selected>
        {{ isset($historico_clinico) ? $historico_clinico->nome_patologia : 'Seleccionar Patologia' }}
    </option>
      
      @isset($patologias)
      @foreach ($patologias as $patologia)
      <option value="{{$patologia->id}}">{{$patologia->nome}}</option>
      @endforeach
          
      @endisset
     
     
     
    </select>
    @error('idPatologia')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <div class="col-md-12">
    <label for="descricao" class="form-label">Descrição</label>

      <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" cols="30" rows="10" style="height: 120px;">{{ isset($historico_clinico) ? $historico_clinico->descricao : '' }}</textarea>
  
    @error('descricao')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

  <div class="col-md-12">
    <label for="resultado" class="form-label">Resultado</label>

      <textarea name="resultado" id="resultado" class="form-control @error('resultado') is-invalid @enderror" cols="30" rows="10" style="height: 120px;">{{ isset($historico_clinico) ? $historico_clinico->resultado : '' }}</textarea>
  
    @error('resultado')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

   

   
   
  
 <!-- End Custom Styled Validation -->
