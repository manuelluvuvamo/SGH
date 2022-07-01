@extends('layouts.merge.painel')
@section('titulo', 'Perfil do funcionário')
@section('conteudo')

<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{isset($funcionario->foto)?$funcionario->foto:''}}" alt="#" class="img-thumbnail">
            <h2>{{ $funcionario->nome }}</h2>
            <h3>{{ $funcionario->nome_funcao }}</h3>
            {{-- <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div> --}}
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Resumo</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Experiência</button>
              </li>

             

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">


                <h5 class="card-title">Informações pessoais</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nome</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->nome }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Gêneroê</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->genero }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Data de Nascimento</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->dataNascimento }}</div>
                </div>
        
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Estado civil</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->estadoCivil }}</div>
                </div>
                
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Local de Nascimento</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->localNascimento }}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nacionalidade</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->nacionalidade }}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">BI</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->numBi }}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Filhação Pai</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->filPai }}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Filhação Mãe</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->filMae }}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">IBAN</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->iban }}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Endereço</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->endereco }}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Telefone</div>
                  <div class="col-lg-9 col-md-8">{{ $funcionario->telefone }}</div>
                </div>
              
              
            
                

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <h5 class="card-title">Experiência</h5>
                @if (isset($experiencias))
 
                   @foreach ($experiencias as $experiencia)
                       
                    <div class="row mt-3">
                        <p>Experiência nº {{$experiencia->id}}</p>
                        <hr>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Instituição</div>
                        <div class="col-lg-9 col-md-8">{{ $experiencia->instituicao }}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Cargo</div>
                        <div class="col-lg-9 col-md-8">{{ $experiencia->cargo }}</div>
                      </div>
                      <div class="row">
                       <div class="col-lg-3 col-md-4 label ">Função</div>
                       <div class="col-lg-9 col-md-8">{{ $experiencia->funcao }}</div>
                     </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Data de inicio</div>
                        <div class="col-lg-9 col-md-8">{{ $experiencia->dataInicio }}</div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Data de término</div>
                        <div class="col-lg-9 col-md-8">{{ $experiencia->dataFim }}</div>
                      </div>
                    </div>
                     
                   @endforeach
                    
                @endif

              </div>



              

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
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

  {{-- EDITION --}}
@if (session('funcionario.update.profile.success'))
<script>
    Swal.fire(
        'Perfil actualizado!',
        '',
        'success'
    )

</script>
@endif

@if (session('funcionario.update.profile.error'))
<script>
    Swal.fire(
        'Falha ao actualizar o seu perfil!',
        'Verifique seus dados',
        'error'
    )

</script>
@endif

 {{-- pass --}}
 @if (session('funcionario.update.pass.success'))
 <script>
     Swal.fire(
         'Sucesso!',
         'Palavra-passe actualizada',
         'success'
     )
 
 </script>
 @endif
 
 @if (session('funcionario.update.pass.error'))
 <script>
     Swal.fire(
         'Falha ao actualizar a palavra-passe!',
         'Envie informações correctas',
         'error'
     )
 
 </script>
 @endif

@endsection

