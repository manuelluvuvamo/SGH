  <!-- Custom Styled Validation -->
 
  <div class="col-md-4">
    <label for="idUser" class="form-label">Utilizador</label>
    <select class="form-select @error('idUser') is-invalid @enderror" id="idUser"  name="idUser" value="old('idUser')" required>
    
      <option value="{{ isset($acesso) ? $acesso->idUser : '0' }}"  {{isset($func)?'':'selected'}}>
        {{ isset($acesso) ? $acesso->nome_usuario : 'Seleccionar utilizador' }}
    </option>
      
      @isset($users)
      @foreach ($users as $user)
      <option value="{{$user->id}}" {{isset($func)?'selected':''}} >{{$user->name}}</option>
      @endforeach
          
      @endisset
     
     
     
    </select>
    @error('idUser')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>


  <div class="col-md-4">
    <label for="menu" class="form-label">Menu</label>
    <select class="form-select @error('menu') is-invalid @enderror" id="menu"  name="menu" value="old('menu')" required>
    
      <option {{isset($acesso->menu)?'':'selected'}} disabled value="">Seleccione um menu</option>
      <option value="Utilizadores" {{ (isset($acesso->menu) && ($acesso->menu == "Utilizadores")) ? 'selected': '' }}>Utilizadores</option>
     
      <option value="Instituição" {{ (isset($acesso->menu) && ($acesso->menu == "Instituição")) ? 'selected': '' }}>Instituição</option>
      <option value="Departamentos" {{ (isset($acesso->menu) && ($acesso->menu == "Departamentos")) ? 'selected': '' }}>Departamentos</option>
      <option value="Funções" {{ (isset($acesso->menu) && ($acesso->menu == "Funções")) ? 'selected': '' }}>Funções</option>
      <option value="Funcionários" {{ (isset($acesso->menu) && ($acesso->menu == "Funcionários")) ? 'selected': '' }}>Funcionários</option>
      <option value="Experiência" {{ (isset($acesso->menu) && ($acesso->menu == "Experiência")) ? 'selected': '' }}>Experiência</option>
      <option value="Formação" {{ (isset($acesso->menu) && ($acesso->menu == "Formação")) ? 'selected': '' }}>Formação</option>
      <option value="Admissão" {{ (isset($acesso->menu) && ($acesso->menu == "Admissão")) ? 'selected': '' }}>Admissão</option>
      <option value="Demissão" {{ (isset($acesso->menu) && ($acesso->menu == "Demissão")) ? 'selected': '' }}>Demissão</option>
      <option value="Remuneração" {{ (isset($acesso->menu) && ($acesso->menu == "Remuneração")) ? 'selected': '' }}>Remuneração</option>
      <option value="Especialidade" {{ (isset($acesso->menu) && ($acesso->menu == "Especialidade")) ? 'selected': '' }}>Especialidade</option>
      <option value="Médico" {{ (isset($acesso->menu) && ($acesso->menu == "Médico")) ? 'selected': '' }}>Médico</option>

      <option value="Critérios" {{ (isset($acesso->menu) && ($acesso->menu == "Critérios")) ? 'selected': '' }}>Critérios</option>
      <option value="Nívies" {{ (isset($acesso->menu) && ($acesso->menu == "Nívies")) ? 'selected': '' }}>Nívies</option>
      <option value="Avaliações" {{ (isset($acesso->menu) && ($acesso->menu == "Avaliações")) ? 'selected': '' }}>Avaliações</option>
     
     
    </select>
    @error('menu')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
 
  <div class="col-md-4">
    <label for="nivel" class="form-label">Nível</label>
    <select class="form-select @error('nivel') is-invalid @enderror" id="nivel"  name="nivel" value="old('nivel')" required>
    
      <option {{isset($acesso->nivel)?'':'selected'}} disabled value="">Seleccione um nivel</option>
      <option value="1" {{ (isset($acesso->nivel) && ($acesso->nivel == "1")) ? 'selected': '' }}>Leitura</option>
     
      <option value="2" {{ (isset($acesso->nivel) && ($acesso->nivel == "2")) ? 'selected': '' }}>Leitura | Escrita</option>
      <option value="3" {{ (isset($acesso->nivel) && ($acesso->nivel == "3")) ? 'selected': '' }}>Leitura | Escrita | Modificação</option>
      <option value="4" {{ (isset($acesso->nivel) && ($acesso->nivel == "4")) ? 'selected': '' }}>Leitura | Escrita | Modificação | Deletação </option>
      <option value="5" {{ (isset($acesso->nivel) && ($acesso->nivel == "5")) ? 'selected': '' }}>Leitura | Escrita | Modificação | Deletação | Deletação permanente</option>
      
     
     
    </select>
    @error('nivel')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
 
   

   
   
  
 <!-- End Custom Styled Validation -->
