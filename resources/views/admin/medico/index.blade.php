@extends('layouts.merge.painel')
@section('titulo', 'Médicos')
@section('conteudo')





    <div class="pagetitle">
      <h1>Médicos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Médicos</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
          <div class="d-flex justify-content-end mb-3">
            @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Médico")->where("nivel",">=",2)->get()->first())
            <a class="btn " href="{{ route('admin.medico.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar novo médico</strong>
            </a>
          </div>
          @endif
            {{-- List of medicos --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de Médicos</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Especialidade</th>
                                    <th scope="col">Nº de ordem</th>
                                    <th scope="col">País de ordem</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($medicos as $medico)
                                <tr>
                                    <th scope="row">{{$medico->id}}</th>
                                    <td>{{$medico->nome_funcionario}}</td>
                                    <td>{{$medico->nome_especialidadeo}}</td>
                                    <td>{{$medico->numOrdem}}</td>
                                    <td>{{$medico->paisOrdem}}</td>
                                    <td>@if ($medico->status == 0)
                                        <span style="color: red;">Desativado</span>
                                    @elseif($medico->status == 1)
                                       <span style="color: green;">Activo</span>
                                    @endif</td>  
                                   
                                   
                                    @csrf
                                    @method('delete')
                                    <td>


                                      <div class="dropdown">
                                          <button class="btn btn-dark btn-sm dropdown-toggle dropdown-menu dropdown-menu-end" type="button"
                                              id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false"
                                              aria-expanded="true">
                                              <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                          </button>
                                          
                                      </div>

                                      <span class="nav-item dropdown">

                                          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                                            <i class="bi bi-arrow-down-square-fill"></i>
                                            <span class="badge bg-success badge-number"></span>
                                          </a><!-- End actions Icon -->
                                
                                          <ul class="dropdown-menu dropdown-menu-center dropdown-menu-arrow messages">
                                            
                                
                                           
                                                @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Médico")->where("nivel",">=",3)->get()->first())
                                            <li class="message-item">
                                             
                                                   <a href="{{ route('admin.medico.edit', $medico->id) }}"
                                                      class="dropdown-item">
                                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                    Editar
                                                  </a>
                                                 
                                            </li>
                                            @endif
                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                
                                           
                                                @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Médico")->where("nivel",">=",4)->get()->first())
                                            <li class="message-item">
                                              <a href="{{ route('admin.medico.delete', $medico->id) }}"
                                                  class="dropdown-item"
                                                  data-confirm="Are you sure that?">
                                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                Eliminar
                                              </a>
                                            </li>
                                            @endif
                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                           
                                                @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Médico")->where("nivel",">=",5)->get()->first())
                                            <li class="message-item">
                                              <a href="{{ route('admin.medico.purge', $medico->id) }}"
                                                  class="dropdown-item"
                                                  data-confirm="Tem certeza que deseja eliminar permanentemente?">
                                               
                                                  Purgar
                                                 
                                              </a>
                                            </li>
                                            @endif
                                          
                                
                                
                                          </ul><!-- End Messages Dropdown Items -->
                                
                                      </span><!-- End Messages Nav -->
                                  </td>
                                </tr>
                              @endforeach
                              
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                    </div>
                    </div>
        
                </div>
        
                
                </div>
            </section>
        @elseif($page == "criar")
               {{--  medico creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de médico</h5>
                          
                      <form action="{{ route('admin.medico.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formMedico.index')
                          <div class="form-group text-center mx-auto col-md-3">
                            <label class="text-white">lorem</label>
                            <button type="submit" class="btn col-md-12" style="background-color: #012970; color:white;">
                                Cadastrar
                            </button>
                    
                          </div>
                        </form>
                  </div>
                  </div>
      
              </div>
      
              
              </div>
          </section>
        @elseif($page=="editar")
          <section class="section">
            <div class="row">
            <div class="col-lg-12">
    
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edição de médico</h5>
                        
                    <form action="{{ route('admin.medico.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formMedico.index')
                        <div class="form-group text-center mx-auto col-md-3">
                          <label class="text-white">lorem</label>
                          <button type="submit" class="btn col-md-12" style="background-color: #012970; color:white;">
                              Salvar
                          </button>
                  
                        </div>
                      </form>
                </div>
                </div>
    
            </div>
    
            
            </div>
          </section>
        @endif
    @endisset

        {{-- CREATION --}}
@if (session('medico.create.success'))
<script>
    Swal.fire(
        'médico criado!',
        '',
        'success'
    )

</script>
@endif

@if (session('medico.create.error'))
<script>
    Swal.fire(
        'Falha ao criar médico!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('medico.update.success'))
<script>
    Swal.fire(
        'médico actualizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('medico.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar a médico!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('medico.delete.success'))
<script>
    Swal.fire(
        'médico eliminada',
        '',
        'success'
    )

</script>
@endif

@if (session('medico.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar médico!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('medico.purge.success'))
<script>
    Swal.fire(
        'médico purgada',
        '',
        'success'
    )

</script>
@endif

@if (session('medico.purge.error'))
<script>
    Swal.fire(
        'Erro ao purgar médico!',
        '',
        'error'
    )

</script>
@endif

 @endsection



