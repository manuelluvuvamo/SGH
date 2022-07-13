  <!-- Custom Styled Validation -->
 
    
    
    <div class="col-md-6 col-lg-6">
      <label for="nome" class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{isset($paciente->nome)?$paciente->nome:old('nome')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('nome')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-6">
      <label for="numBI" class="form-label">BI</label>
      <input type="text"  name="numBI" class="form-control @error('numBI') is-invalid @enderror" id="numBI" value="{{isset($paciente->numBI)?$paciente->numBI:old('numBI')}}" required autofocus minlength="14" maxlength="14">
      <div class="valid-feedback"  >
        parece bom!
      </div>
      @error('numBI')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-6">
      <label for="dataNascimento" class="form-label">Data de nascimento</label>
      <input type="date" name="dataNascimento" class="form-control @error('dataNascimento') is-invalid @enderror" id="dataNascimento" value="{{isset($paciente->dataNascimento)?$paciente->dataNascimento:old('dataNascimento')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('dataNascimento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-6">
      <label for="estadoCivil" class="form-label">Estado civil</label>
      <select class="form-select @error('estadoCivil') is-invalid @enderror" id="estadoCivil"  name="estadoCivil" value="old('estadoCivil')" required>
      
        <option {{isset($paciente->estadoCivil)?'':'selected'}} disabled value="">Seleccione um estado</option>
        <option value="Solteiro" {{ (isset($paciente->estadoCivil) && ($paciente->estadoCivil == "Solteiro")) ? 'selected': '' }}>Solteiro</option>
       
        <option value="Casado" {{ (isset($paciente->estadoCivil) && ($paciente->estadoCivil == "Casado")) ? 'selected': '' }}>Casado</option>

        <option value="Viuvo" {{ (isset($paciente->estadoCivil) && ($paciente->estadoCivil == "Viuvo")) ? 'selected': '' }}>Viuvo</option>

        <option value="Divorciado" {{ (isset($paciente->estadoCivil) && ($paciente->estadoCivil == "Divorciado")) ? 'selected': '' }}>Divorciado</option>
       
       
       
      </select>
      @error('estadoCivil')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    <div class="col-md-6 col-lg-6">
      <label for="nacionalidade" class="form-label">Nacionalidade</label>
      <input type="text" name="nacionalidade" class="form-control @error('nacionalidade') is-invalid @enderror" id="nacionalidade" value="{{isset($paciente->nacionalidade)?$paciente->nacionalidade:old('nacionalidade')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('nacionalidade')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-6">
      <label for="telefone" class="form-label">Telefone</label>
      <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror" id="telefone" value="{{isset($paciente->telefone)?$paciente->telefone:old('telefone')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('telefone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-6 col-lg-6">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{isset($paciente->email)?$paciente->email:old('email')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-6 col-lg-6">
      <label for="endereco" class="form-label">Endereço</label>
      <input type="text" name="endereco" class="form-control @error('endereco') is-invalid @enderror" id="endereco" value="{{isset($paciente->endereco)?$paciente->endereco:old('endereco')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('endereco')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    
    
    
    
    
 <!-- End Custom Styled Validation -->
