@extends('layouts.merge.painel')
@section('titulo', 'Consultas')
@section('conteudo')





    <div class="pagetitle">
      <h1>Consultas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Consultas</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
          <div class="d-flex justify-content-end mb-3">
            @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Consulta")->where("nivel",">=",2)->get()->first())
            <a class="btn " href="{{ route('admin.consulta.create') }}" style="background-color: #012970;">
                <strong class="text-light">Realizar Consulta</strong>
            </a>
          </div>
          @endif
            {{-- List of consultas --}}
        

            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body table-responsive">
                      <h5 class="card-title">Lista de Consultas Realizadas</h5>
                              <!-- Table with stripped rows -->
                          <table class=" datatable ">
                              <thead>
                              <tr>

                                  <th scope="col">#</th>
                                  <th scope="col">Paciente</th>
                                  <th scope="col">Funcionário</th>
                                  <th scope="col">Especialidade</th>
                                  <th scope="col">Descrição</th>
                                  <th scope="col">Data</th>
                                  <th scope="col">Hora</th>
                                  <th scope="col">Diagnóstico</th>
                              
                                  <th scope="col">Accções</th>
                              </tr>
                              </thead>
                              <tbody>
                            @foreach ($consultas as $consulta)
                              <tr>
                                  <th scope="row">{{$consulta->id}}</th>
                                  <td>{{$consulta->nome_paciente}}</td>
                                  <td>{{$consulta->nome_funcionario}}</td>
                                  <td>{{$consulta->nome_especialidade}}</td>
                                  <td>{{$consulta->descricao}}</td>
                                  <td>{{$consulta->data}}</td>
                                  <td>{{$consulta->hora}}</td>
                                  <td>{{$consulta->diagnostico}}</td>
                                 
                                  
                                 
                                  @csrf
                                  @method('delete')
                                  <td>


                                      <div class="dropdown">
                                          <button class="btn btn-dark btn-sm dropdown-toggle dropdown-menu dropdown-menu-end" type="button"
                                              id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false"
                                              aria-expanded="false">
                                              <i class="fa fa-clone fa-sm" aria-hidden="true"></i>
                                          </button>
                                          
                                      </div>

                                      <span class="nav-item dropdown">

                                          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                                            <i class="bi bi-arrow-down-square-fill"></i>
                                            <span class="badge bg-success badge-number"></span>
                                          </a><!-- End actions Icon -->
                                
                                          <ul class="dropdown-menu dropdown-menu-center dropdown-menu-arrow messages">
                                

                                             @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Consulta")->where("nivel",">=",3)->get()->first())
                                            <li class="message-item">
                                              
                                             
                                                   <a href="{{ route('admin.consulta.edit', $consulta->id) }}"
                                                      class="dropdown-item">
                                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                    Editar
                                                  </a>
                                                 
                                            </li>
                                            @endif
                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>

                                            
                                

                                             @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Consulta")->where("nivel",">=",4)->get()->first())
                                            <li class="message-item">
                                              <a href="{{ route('admin.consulta.delete', $consulta->id) }}"
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

                                             @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Consulta")->where("nivel",">=",5)->get()->first())
                                            <li class="message-item">
                                              <a href="{{ route('admin.consulta.purge', $consulta->id) }}"
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
               {{--  consulta creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Consulta</h5>
                          
                      <form action="{{ route('admin.consulta.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formConsulta.index')
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
                    <h5 class="card-title">Edição de Consulta</h5>
                        
                    <form action="{{ route('admin.consulta.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formConsulta.index')
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
@if (session('consulta.create.success'))
<script>
    Swal.fire(
        'Consulta realizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('consulta.create.error'))
<script>
    Swal.fire(
        'Falha ao realizar Consulta!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('consulta.update.success'))
<script>
    Swal.fire(
        'Consulta actualizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('consulta.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar Consulta!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('consulta.delete.success'))
<script>
    Swal.fire(
        'Consulta eliminada',
        '',
        'success'
    )

</script>
@endif

@if (session('consulta.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar Consulta!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('consulta.purge.success'))
<script>
    Swal.fire(
        'Consulta purgada',
        '',
        'success'
    )

</script>
@endif

@if (session('consulta.purge.error'))
<script>
    Swal.fire(
        'Erro ao purgar Consulta!',
        '',
        'error'
    )

</script>
@endif

 @endsection



