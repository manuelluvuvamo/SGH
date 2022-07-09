  <!-- Custom Styled Validation -->
 
    
    
    <div class="col-md-6 col-lg-6">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{isset($especialidade->nome)?$especialidade->nome:old('nome')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    
    
    
    
    
 <!-- End Custom Styled Validation -->
