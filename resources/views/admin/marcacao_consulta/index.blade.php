@extends('layouts.merge.painel')
@section('titulo', 'Marcação de Consultas')
@section('conteudo')





    <div class="pagetitle">
      <h1>Marcação de Consultas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Marcação de Consultas</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
          <div class="d-flex justify-content-end mb-3">
            @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","MarcacaoConsulta")->where("nivel",">=",2)->get()->first())
            <a class="btn " href="{{ route('admin.marcacao_consulta.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar nova Marcação de Consulta</strong>
            </a>
          </div>
          @endif
            {{-- List of marcacao_consultas --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de Consultas Marcadas</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Paciente</th>
                                    <th scope="col">Especialidade</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Hora<th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($marcacao_consultas as $marcacao_consulta)
                                <tr>
                                    <th scope="row">{{$marcacao_consulta->id}}</th>
                                    <td>{{$marcacao_consulta->nome_paciente}}</td>
                                    <td>{{$marcacao_consulta->nome_especialidade}}</td>
                                    <td>{{$marcacao_consulta->descricao}}</td>
                                    <td>{{$marcacao_consulta->data}}</td>
                                    <td>{{$marcacao_consulta->hora}}</td>
                                    <td>@if ($marcacao_consulta->status == 0)
                                        <span style="color: red;">Desativado</span>
                                    @elseif($marcacao_consulta->status == 1)
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

                                            @if (Auth::user()->tipo_conta == "Administrador")

                                                @if ($marcacao_consulta->data != date("Y-m-d") && $marcacao_consulta->hora <= date("H:s:i"))
                                                  <li class="message-item">
                                              
                                                    <a href="{{ route('admin.consulta.create-direct', $marcacao_consulta->id) }}"
                                                      class="dropdown-item" style="background-color: rgb(11, 171, 11);">
                                                      <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                      Realizar Consulta
                                                      </a>
                                                
                                                   </li>
                                                   @elseif ($marcacao_consulta->data == date("Y-m-d") && $marcacao_consulta->hora >= date("H:s:i"))
                                                   <li class="message-item">
                                               
                                                     <a href="{{ route('admin.consulta.create-direct', $marcacao_consulta->id) }}"
                                                       class="dropdown-item" style="background-color:rgba(242, 230, 94, 0.783);">
                                                       <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                       Realizar Consulta
                                                       </a>
                                                 
                                                    </li>
                                                @else

                                                <li class="message-item">
                                              
                                                  <span class="dropdown-item" style="cursor: pointer;background-color: grey;color:#ccc">
                                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle" disabled>
                                                    Realizar Consulta
                                                  </span>
                                              
                                                 </li>

                                                @endif

                                            @endif
                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                
                                            
                                                @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","MarcacaoConsulta")->where("nivel",">=",3)->get()->first())
                                            <li class="message-item">
                                             
                                                   <a href="{{ route('admin.marcacao_consulta.edit', $marcacao_consulta->id) }}"
                                                      class="dropdown-item">
                                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                    Editar
                                                  </a>
                                                 
                                            </li>
                                            @endif
                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                
                                           
                                                @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","MarcacaoConsulta")->where("nivel",">=",4)->get()->first())
                                            <li class="message-item">
                                              <a href="{{ route('admin.marcacao_consulta.delete', $marcacao_consulta->id) }}"
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
                                           
                                                @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","MarcacaoConsulta")->where("nivel",">=",5)->get()->first())
                                            <li class="message-item">
                                              <a href="{{ route('admin.marcacao_consulta.purge', $marcacao_consulta->id) }}"
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
               {{--  marcacao_consulta creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Marcação de Consulta</h5>
                          
                      <form action="{{ route('admin.marcacao_consulta.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formMarcacaoConsulta.index')
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
                    <h5 class="card-title">Edição de Consulta Marcada</h5>
                        
                    <form action="{{ route('admin.marcacao_consulta.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formMarcacaoConsulta.index')
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
@if (session('marcacao_consulta.create.success'))
<script>
    Swal.fire(
        'Consulta marcada!',
        '',
        'success'
    )

</script>
@endif

@if (session('marcacao_consulta.create.error'))
<script>
    Swal.fire(
        'Falha ao marcar Consulta!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('marcacao_consulta.update.success'))
<script>
    Swal.fire(
        'Marcação de Consulta actualizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('marcacao_consulta.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar Marcação de Consulta!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('marcacao_consulta.delete.success'))
<script>
    Swal.fire(
        'Marcação de Consulta eliminada',
        '',
        'success'
    )

</script>
@endif

@if (session('marcacao_consulta.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar Marcação de Consulta!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('marcacao_consulta.purge.success'))
<script>
    Swal.fire(
        'Marcação purgada',
        '',
        'success'
    )

</script>
@endif

@if (session('marcacao_consulta.purge.error'))
<script>
    Swal.fire(
        'Erro ao purgar Marcação!',
        '',
        'error'
    )

</script>
@endif

 @endsection



