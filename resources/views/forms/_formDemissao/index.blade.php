  <!-- Custom Styled Validation -->
 
  <div class="col-md-6">
    <label for="idFuncionario" class="form-label">Funcionário</label>
    <select class="form-select @error('idFuncionario') is-invalid @enderror" id="idFuncionario"  name="idFuncionario" value="old('idFuncionario')" required>
    
      <option value="{{ isset($demissao) ? $demissao->idFuncionario : '0' }}"  {{isset($func)?'':'selected'}}>
        {{ isset($demissao) ? $demissao->nome_funcionario : 'Seleccionar funcionario' }}
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
 

    <div class="col-md-6">
      <label for="motivo" class="form-label">Motivo</label>
      <input type="text" name="motivo" class="form-control @error('motivo') is-invalid @enderror" id="motivo" value="{{isset($demissao->motivo)?$demissao->motivo:old('motivo')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('motivo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-12">
      <label for="descricao" class="form-label">Descrição</label>
     

      <textarea name="descricao" class="form-control @error('descricao') is-invalid @enderror" id="descricao" value="{{isset($demissao->descricao)?$demissao->descricao:old('descricao')}}" cols="30" rows="10">{{isset($demissao->descricao)?$demissao->descricao:old('descricao')}}</textarea>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('descricao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

   

   
   
  
 <!-- End Custom Styled Validation -->
