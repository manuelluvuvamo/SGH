  <!-- Custom Styled Validation -->
 
    

    <div class="col-md-4">
      <label for="name" class="form-label">Nome</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{isset($user->name)?$user->name:old('name')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

   
    <div class="col-md-4">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{isset($user->email)?$user->email:old('email')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="tipo_conta" class="form-label">Tipo de Conta</label>
      <select class="form-select @error('tipo_conta') is-invalid @enderror" id="tipo_conta"  name="tipo_conta" value="old('tipo_conta')" required>
      
        <option {{isset($user->tipo_conta)?'':'selected'}} disabled value="">Seleccione um tipo</option>
        <option value="Administrador" {{ (isset($user->tipo_conta) && ($user->tipo_conta == "Administrador")) ? 'selected': '' }}>Administrador</option>
       
        <option value="Enfermeiro" {{ (isset($user->tipo_conta) && ($user->tipo_conta == "Enfermeiro")) ? 'selected': '' }}>Enfermeiro</option>
       
       
       
      </select>
      @error('tipo_conta')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
   
    <div class="col-md-4">
      <label for="password" class="form-label">Palavra-passe</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="password_confirmation" class="form-label">Confirme a palavra-passe</label>
      <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" value="" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

  
 <!-- End Custom Styled Validation -->
