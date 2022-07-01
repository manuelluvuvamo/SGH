  <!-- Custom Styled Validation -->
 
  <div class="row mb-3">
    <label for="logo" class="col-md-4 col-lg-3 col-form-label">Foto</label>
    <div class="col-md-8 col-lg-9">
      <img src="{{isset($funcionario->foto)?$funcionario->foto:''}}" width="250px"  alt="{{isset($funcionario->nome)?$funcionario->nome:''}}" id="img-perfil">
      <div class="pt-2">
       
        <label for="foto" class="col-sm-2 col-form-label btn btn-primary btn-sm"><i class="bi bi-upload"></i></label>
        <input style="visibility: hidden" class="form-control" type="file" id="foto" name="foto" >
        {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <label for="numBi" class="form-label">BI</label>
    <input type="text"  name="numBi" class="form-control @error('numBi') is-invalid @enderror" id="numBi" value="{{isset($funcionario->numBi)?$funcionario->numBi:old('numBi')}}" required autofocus minlength="14" maxlength="14">
    <div class="valid-feedback"  >
      parece bom!
    </div>
    @error('numBi')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>

    <div class="col-md-4">
      <label for="name" class="form-label">Nome</label>
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{isset($funcionario->nome)?$funcionario->nome:old('name')}}" required>
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
      <label for="idFuncao" class="form-label">Função</label>
      <select class="form-select @error('idFuncao') is-invalid @enderror" id="idFuncao"  name="idFuncao" value="old('idFuncao')" required>
      
        <option value="{{ isset($funcionario) ? $funcionario->idFuncao : '0' }}" selected>
          {{ isset($funcionario) ? $funcionario->nome_funcao : 'Seleccionar função' }}
      </option>
        
        @isset($funcaos)
        @foreach ($funcaos as $funcao)
        <option value="{{$funcao->id}}">{{$funcao->nome}}</option>
        @endforeach
            
        @endisset
       
       
       
      </select>
      @error('idFuncao')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="genero" class="form-label">Gênero</label>
      <select class="form-select @error('genero') is-invalid @enderror" id="genero"  name="genero" value="old('genero')" required>
      
        <option {{isset($funcionario->genero)?'':'selected'}} disabled value="">Seleccione um gênero</option>
        <option value="Masculino" {{ (isset($funcionario->genero) && ($funcionario->genero == "Masculino")) ? 'selected': '' }}>Masculino</option>
       
        <option value="Femenino" {{ (isset($funcionario->genero) && ($funcionario->genero == "Femenino")) ? 'selected': '' }}>Femenino</option>
       
       
       
      </select>
      @error('genero')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="col-md-4">
      <label for="dataNascimento" class="form-label">Data de Nascimento</label>
      <input type="date" name="dataNascimento" class="form-control @error('dataNascimento') is-invalid @enderror" id="dataNascimento" value="{{isset($funcionario->dataNascimento)?$funcionario->dataNascimento:old('dataNascimento')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('dataNascimento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="col-md-4">
      <label for="estadoCivil" class="form-label">Estado civil</label>
      <select class="form-select @error('estadoCivil') is-invalid @enderror" id="estadoCivil"  name="estadoCivil" value="old('estadoCivil')" required>
      
        <option {{isset($funcionario->estadoCivil)?'':'selected'}} disabled value="">Seleccione um estado</option>
        <option value="Solteiro" {{ (isset($funcionario->estadoCivil) && ($funcionario->estadoCivil == "Solteiro")) ? 'selected': '' }}>Solteiro</option>
       
        <option value="Casado" {{ (isset($funcionario->estadoCivil) && ($funcionario->estadoCivil == "Casado")) ? 'selected': '' }}>Casado</option>

        <option value="Viuvo" {{ (isset($funcionario->estadoCivil) && ($funcionario->estadoCivil == "Viuvo")) ? 'selected': '' }}>Viuvo</option>

        <option value="Divorciado" {{ (isset($funcionario->estadoCivil) && ($funcionario->estadoCivil == "Divorciado")) ? 'selected': '' }}>Divorciado</option>
       
       
       
      </select>
      @error('estadoCivil')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="col-md-4">
      <label for="localNascimento" class="form-label">Local de Nascimento</label>
      <input type="text" name="localNascimento" class="form-control @error('localNascimento') is-invalid @enderror" id="localNascimento" value="{{isset($funcionario->localNascimento)?$funcionario->localNascimento:old('localNascimento')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('localNascimento')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="nacionalidade" class="form-label">Nacionalidade</label>
      <input type="text" name="nacionalidade" class="form-control @error('nacionalidade') is-invalid @enderror" id="nacionalidade" value="{{isset($funcionario->nacionalidade)?$funcionario->nacionalidade:old('nacionalidade')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('nacionalidade')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="filPai" class="form-label">Filhação Pai</label>
      <input type="text" name="filPai" class="form-control @error('filPai') is-invalid @enderror" id="filPai" value="{{isset($funcionario->filPai)?$funcionario->filPai:old('filPai')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('filPai')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="filMae" class="form-label">Filhação Mãe</label>
      <input type="text" name="filMae" class="form-control @error('filMae') is-invalid @enderror" id="filMae" value="{{isset($funcionario->filMae)?$funcionario->filMae:old('filMae')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('filMae')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4">
      <label for="telefone" class="form-label">Telefone</label>
      <input type="text" name="telefone" class="form-control @error('telefone') is-invalid @enderror" id="telefone" value="{{isset($funcionario->telefone)?$funcionario->telefone:old('telefone')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('telefone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="col-md-4">
      <label for="email" class="form-label">Email</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{isset($funcionario->email)?$funcionario->email:old('email')}}" required>
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
      <label for="endereco" class="form-label">Endereço</label>
      <input type="text" name="endereco" class="form-control @error('endereco') is-invalid @enderror" id="endereco" value="{{isset($funcionario->endereco)?$funcionario->endereco:old('endereco')}}" required>
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('endereco')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-md-4">
      <label for="iban" class="form-label">IBAN</label>
      <input type="text" name="iban" class="form-control @error('iban') is-invalid @enderror" id="iban" value="{{isset($funcionario->iban)?$funcionario->iban:old('iban')}}" required minlength="21" maxlength="25">
      <div class="valid-feedback">
        parece bom!
      </div>
      @error('iban')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>










   

    <script>
       const $ = document.querySelector.bind(document);
        const previewImg = $('#img-perfil');
        const fileChooser = $('#foto');

        fileChooser.onchange = e => {
            const fileToUpload = e.target.files.item(0);
            const reader = new FileReader();

            // evento disparado quando o reader terminar de ler 
            reader.onload = e => previewImg.src = e.target.result;

            // solicita ao reader que leia o arquivo 
            // transformando-o para DataURL. 
            // Isso disparará o evento reader.onload.
            reader.readAsDataURL(fileToUpload);
        };
    </script>



<script>
 

$("#numBi").keyup(function() {
    //Your code
    alert("foi")
});
</script>
  
 <!-- End Custom Styled Validation -->
