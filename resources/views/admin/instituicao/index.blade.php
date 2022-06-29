@extends('layouts.merge.painel')
@section('titulo', 'Instituicao')
@section('conteudo')

<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            
            @if(isset($instituicao->logo))
            <img src="{{isset($instituicao->logo)?$instituicao->logo:''}}" alt="{{$instituicao->nomeCurto}}" class="rounded-circle">
            @else
              <h3>{{$instituicao->nomeCurto}}</h3>
            @endif
            <h3>{{ $instituicao->nomeLongo }}</h3>
            <h4>{{ $instituicao->nomeCurto }}</h4>
            
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
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Instituição</button>
              </li>

              

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Missão</h5>
                  <p class="small fst-italic">{{$instituicao->missao}}</p>

                <h5 class="card-title">Detalhes da instituição</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nome Completo</div>
                  <div class="col-lg-9 col-md-8">{{$instituicao->nomeLongo}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Nome curto</div>
                  <div class="col-lg-9 col-md-8">{{$instituicao->nomeCurto}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Endereço</div>
                  <div class="col-lg-9 col-md-8">{{$instituicao->endereco}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">NIF</div>
                  <div class="col-lg-9 col-md-8">{{ $instituicao->nif }}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">IBAN</div>
                  <div class="col-lg-9 col-md-8">{{ $instituicao->iban }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email Principal</div>
                  <div class="col-lg-9 col-md-8">{{ $instituicao->email1 }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email Secundário</div>
                  <div class="col-lg-9 col-md-8">{{ $instituicao->email2 }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Telefone Principal</div>
                  <div class="col-lg-9 col-md-8">{{ $instituicao->telefone1 }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Telefone Secundário</div>
                  <div class="col-lg-9 col-md-8">{{ $instituicao->telefone2 }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="{{ route('admin.instituicao.update',$instituicao->id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                  @method('put')
                  @csrf
                  <div class="row mb-3">
                    <label for="logo" class="col-md-4 col-lg-3 col-form-label">Imagem de perfil</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="{{isset($instituicao->logo)?$instituicao->logo:''}}" alt="{{$instituicao->nomeCurto}}" id="img-perfil">
                      <div class="pt-2">
                       
                        <label for="logo" class="col-sm-2 col-form-label btn btn-primary btn-sm"><i class="bi bi-upload"></i></label>
                        <input style="visibility: hidden" class="form-control" type="file" id="logo" name="logo" >
                        {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
                      </div>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="nomeLongo" class="col-md-4 col-lg-3 col-form-label">Nome Completo</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nomeLongo" type="text" class="form-control" id="nomeLongo" value="{{ $instituicao->nomeLongo }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="nomeCurto" class="col-md-4 col-lg-3 col-form-label">Nome Curto</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nomeCurto" type="text" class="form-control" id="nomeCurto" value="{{ $instituicao->nomeCurto }}">
                    </div>
                  </div>



                  <div class="row mb-3">
                    <label for="endereco" class="col-md-4 col-lg-3 col-form-label">Endereço</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="endereco" type="text" class="form-control" id="endereco" value="{{ $instituicao->endereco }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="nif" class="col-md-4 col-lg-3 col-form-label">NIF</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nif" type="text" class="form-control" maxlength="14" minlength="5" id="nif" value="{{ $instituicao->nif }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="iban" class="col-md-4 col-lg-3 col-form-label">IBAN</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="iban" type="text" class="form-control" maxlength="25" minlength="21" id="iban" value="{{ $instituicao->iban }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email1" class="col-md-4 col-lg-3 col-form-label">Email Principal</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email1" type="text" class="form-control" id="email1" value="{{ $instituicao->email1 }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email2" class="col-md-4 col-lg-3 col-form-label">Email Secundário</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email2" type="text" class="form-control" id="email2" value="{{ $instituicao->email2 }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="telefone1" class="col-md-4 col-lg-3 col-form-label">Telefone Principal</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="telefone1" type="text" class="form-control" id="telefone1" value="{{ $instituicao->telefone1 }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="telefone2" class="col-md-4 col-lg-3 col-form-label">Telefone Secundário</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="telefone2" type="text" class="form-control" id="telefone2" value="{{ $instituicao->telefone2 }}">
                    </div>
                  </div>

                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                  </div>
                </form><!-- End Profile Edit Form -->

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
        const fileChooser = $('#logo');

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
@if (session('instituicao.update.success'))
<script>
    Swal.fire(
        'Instituição actualizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('instituicao.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar a instituição!',
        'Verifique os dados enviados',
        'error'
    )

</script>
@endif

 

@endsection

