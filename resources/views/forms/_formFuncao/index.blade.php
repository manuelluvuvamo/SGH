  <!-- Custom Styled Validation -->
 
    

    <div class="col-md-4">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{isset($funcao->nome)?$funcao->nome:old('nome')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

   

    <div class="col-md-4">
      <label for="id_departamento" class="form-label">Departamento</label>
      <select class="form-select @error('id_departamento') is-invalid @enderror" id="id_departamento"  name="id_departamento" value="old('id_departamento')" required>
      
        <option value="{{ isset($funcao) ? $funcao->id_departamento : '0' }}" selected>
          {{ isset($funcao) ? $funcao->nome_departamento : 'Seleccionar departamento' }}
      </option>
        
        @isset($departamentos)
        @foreach ($departamentos as $departamento)
        <option value="{{$departamento->id}}">{{$departamento->nome}}</option>
        @endforeach
            
        @endisset
       
       
       
      </select>
      @error('id_departamento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
   
  
 <!-- End Custom Styled Validation -->
