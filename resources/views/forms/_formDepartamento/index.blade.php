  <!-- Custom Styled Validation -->
 
    
    
    <div class="col-md-4">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{isset($departamento->nome)?$departamento->nome:old('nome')}}" required>
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
      <label for="responsavel" class="form-label">Responsável</label>
      <input type="text" name="responsavel" class="form-control @error('responsavel') is-invalid @enderror" id="responsavel" value="{{isset($departamento->responsavel)?$departamento->responsavel:old('responsavel')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('responsavel')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    
    
    
    
    
 <!-- End Custom Styled Validation -->
