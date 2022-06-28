@extends('layouts.merge.painel')
@section('titulo', 'Perfil')
@section('conteudo')

@php
    $user = \App\Models\User::join('personal_datas', 'users.id_data', 'personal_datas.id')

            ->select(
                'users.*',
                'personal_datas.nif',
                'personal_datas.first_name',
                'personal_datas.last_name',
                "personal_datas.country",
                "personal_datas.city",
                "personal_datas.street",
                "personal_datas.desc"
            )
            ->where('users.id', Auth::user()->id)
            ->get()->first();

@endphp
<section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{isset(Auth::user()->profile_photo_path)?Auth::user()->profile_photo_path:''}}" alt="{{Auth::user()->name}}" class="rounded-circle">
            <h2>{{ Auth::user()->name }}</h2>
            <h3>{{ Auth::user()->tipo_conta }}</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
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
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar Perfil</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Mudar palavra-passe</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">


                <h5 class="card-title">Detalhes do perfil</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nome Completo</div>
                  <div class="col-lg-9 col-md-8">{{ $user->first_name }} {{ $user->last_name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Pais</div>
                  <div class="col-lg-9 col-md-8">{{ $user->country }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Endereço</div>
                  <div class="col-lg-9 col-md-8">{{ $user->street }}, {{ $user->city }}, {{ $user->desc }}</div>
                </div>

                -<div class="row">
                  <div class="col-lg-3 col-md-4 label">NIF</div>
                  <div class="col-lg-9 col-md-8">{{ $user->nif }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                </div>

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form action="{{ route('admin.user.update.profile',Auth::user()->id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                  @method('put')
                  @csrf
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Imagem de perfil</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="{{isset(Auth::user()->profile_photo_path)?Auth::user()->profile_photo_path:''}}" alt="{{Auth::user()->name}}" id="img-perfil">
                      <div class="pt-2">
                       
                        <label for="profile_photo_path" class="col-sm-2 col-form-label btn btn-primary btn-sm"><i class="bi bi-upload"></i></label>
                        <input style="visibility: hidden" class="form-control" type="file" id="profile_photo_path" name="profile_photo_path" >
                        {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
                      </div>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="first_name" class="col-md-4 col-lg-3 col-form-label">Primeiro Nome</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="first_name" type="text" class="form-control" id="first_name" value="{{ $user->first_name }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="last_name" class="col-md-4 col-lg-3 col-form-label">Sobrenome</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="last_name" type="text" class="form-control" id="last_name" value="{{ $user->last_name }}">
                    </div>
                  </div>



                  <div class="row mb-3">
                    <label for="country" class="col-md-4 col-lg-3 col-form-label">Pais</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="country" type="text" class="form-control" id="country" value="{{ $user->country }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="city" class="col-md-4 col-lg-3 col-form-label">Cidade</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="city" type="text" class="form-control" id="city" value="{{ $user->city }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="street" class="col-md-4 col-lg-3 col-form-label">Rua</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="street" type="text" class="form-control" id="street" value="{{ $user->street }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="desc" class="col-md-4 col-lg-3 col-form-label">Mais sobre o endereço</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="desc" type="text" class="form-control" id="desc" value="{{ $user->desc }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="nif" class="col-md-4 col-lg-3 col-form-label">NIF</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="nif" type="text" class="form-control" id="nif" value="{{ $user->nif }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-lg-3 col-form-label">Nome de utilizador</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="name" value="{{ $user->name }}">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>



              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form action="{{ route('admin.user.update.pass',Auth::user()->id)}}" method="post">
                  @method('put')
                  @csrf

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Palavra-passe actual</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="password" class="col-md-4 col-lg-3 col-form-label">Nova palavra-passe</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control  @error('password') is-invalid @enderror" id="password">

                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Confirme a nova palavra-passe</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password_confirmation" type="password" class="form-contro  @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                      @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Alterar palavra-passe</button>
                  </div>
                </form><!-- End Change Password Form -->

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
        const fileChooser = $('#profile_photo_path');

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
@if (session('user.update.profile.success'))
<script>
    Swal.fire(
        'Perfil actualizado!',
        '',
        'success'
    )

</script>
@endif

@if (session('user.update.profile.error'))
<script>
    Swal.fire(
        'Falha ao actualizar o seu perfil!',
        'Verifique seus dados',
        'error'
    )

</script>
@endif

 {{-- pass --}}
 @if (session('user.update.pass.success'))
 <script>
     Swal.fire(
         'Sucesso!',
         'Palavra-passe actualizada',
         'success'
     )
 
 </script>
 @endif
 
 @if (session('user.update.pass.error'))
 <script>
     Swal.fire(
         'Falha ao actualizar a palavra-passe!',
         'Envie informações correctas',
         'error'
     )
 
 </script>
 @endif

@endsection

