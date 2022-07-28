  <!-- Custom Styled Validation -->





  <div class="col-md-6">
    <label for="idPaciente" class="form-label">Paciente</label>
    <select class="form-select @error('idPaciente') is-invalid @enderror" id="idPaciente"  name="idPaciente" value="old('idPaciente')" required>
    
      <option value="{{ isset($marcacao_consulta) ? $marcacao_consulta->idPaciente : '0' }}"  {{isset($func)?'':'selected'}}>
        {{ isset($marcacao_consulta) ? $marcacao_consulta->nome_paciente : 'Seleccionar paciente' }}
    </option>
      
      @isset($pacientes)
      @foreach ($pacientes as $paciente)
      <option value="{{$paciente->id}}" {{isset($func)?'selected':''}} >{{$paciente->nome}}</option>
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
    <label for="idEspecialidade" class="form-label">Especialidade</label>
    <select class="form-select @error('idEspecialidade') is-invalid @enderror" id="idEspecialidade"  name="idEspecialidade" value="old('idEspecialidade')" required>
    
      <option value="{{ isset($marcacao_consulta) ? $marcacao_consulta->idEspecialidade : '0' }}" selected>
        {{ isset($marcacao_consulta) ? $marcacao_consulta->nome_especialidade : 'Seleccionar especialidade' }}
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
    

    <div class="col-md-6">
      <label for="data" class="form-label">Data</label>
      <br>
      {{-- <input type="text"  name="date" value=""  class="datepicker form-control" autocomplete="off"> --}} 
      <input type="date" name="data" class=" datepicker form-control @error('data') is-invalid @enderror" id="data" value="{{isset($marcacao_consulta->data)?$marcacao_consulta->data:old('data')}}" required  autocomplete="off">
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('data')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6">
      <label for="hora" class="form-label">Hora</label>
      <input type="time" name="hora" class="form-control @error('hora') is-invalid @enderror" id="hora" value="{{isset($marcacao_consulta->hora)?$marcacao_consulta->hora:old('hora')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('hora')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-12">
    <label for="descricao" class="form-label">Descrição</label>

      <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror" cols="30" rows="10" style="height: 120px;">{{ isset($marcacao_consulta) ? $marcacao_consulta->descricao : '' }}</textarea>
  
    @error('descricao')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

 {{--    <script type="text/javascript"> 

        let datas;
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: "/marcacao_consulta/datas-marcadas/",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            async: false,
            }).done(function(data) {
          // Optionally alert the user of success here...
                datas = data;

                //console.log(datas);

              /*   var disableDates = ["9-11-2019", "14-11-2019", "15-11-2019","27-12-2019"];  */
             /*  var disableDates =  "";
              console.log(disableDates);

                $('.datepicker').datetimepicker({ 

                    format: 'dd/mm/yyyy', 

                    beforeShowDay: function(date){ 

                        dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear(); 

                        if(disableDates.indexOf(dmy) != -1){ 

                            return false; 

                        } 

                        else{ 

                            return true; 

                        } 

                    } 

                }); 
 */
               
            }).fail(function(data) {
          // Optionally alert the user of an error here...
                console.log("houve um erro ao buscar as datas")
    });


       

    </script>  --}}
   


   
  
 <!-- End Custom Styled Validation -->
