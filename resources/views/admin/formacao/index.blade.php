@extends('layouts.merge.painel')
@section('titulo', 'Formação do funcionario')
@section('conteudo')





    <div class="pagetitle">
      <h1>Formação do funcionario</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Formação do funcionario</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
        @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Formação")->where("nivel",">=",2)->get()->first())
          <div class="d-flex justify-content-end mb-3">
            <a class="btn " href="{{ route('admin.formacao.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar Formação</strong>
            </a>
          </div>
          @endif
            {{-- List of formacaos --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de Formação do funcionario</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Funcionario</th>
                                    <th scope="col">Instituição</th>
                                    <th scope="col">Curso</th>
                                    <th scope="col">Nível</th>
                                    <th scope="col">Data de início</th>
                                    <th scope="col">Data de término</th>
                                    <th scope="col">Estado</th>               
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($formacaos as $formacao)
                                <tr>
                                    <th scope="row">{{$formacao->id}}</th>
                                    <td>{{$formacao->nome_funcionario}}</td>
                                    <td>{{$formacao->instituicao}}</td>
                                    <td>{{$formacao->curso}}</td>
                                    <td>{{$formacao->nivel}}</td>
                                    <td>{{$formacao->dataInicio}}</td>
                                    <td>{{$formacao->dataFim}}</td>
                                    <td>@if ($formacao->status == 0)
                                        <span style="color: red;">Desativado</span>
                                    @elseif($formacao->status == 1)
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
                                            
                                            
                                             @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Formação")->where("nivel",">=",3)->get()->first())
                                            <li class="message-item">
                                             
                                                   <a href="{{ route('admin.formacao.edit', $formacao->id) }}"
                                                      class="dropdown-item">
                                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                    Editar
                                                  </a>
                                                 
                                            </li>

                                            @endif
                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                            
                                             @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Formação")->where("nivel",">=",4)->get()->first())
                                            <li class="message-item">
                                              <a href="{{ route('admin.formacao.delete', $formacao->id) }}"
                                                  class="dropdown-item"
                                                  data-confirm="Are you sure that?">
                                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                Eliminar
                                              </a>
                                            </li>
                                            @endif
                                            <li>
                                              <hr class="dropdown-divider">
                                              
                                             @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Formação")->where("nivel",">=",5)->get()->first())</li>
                                            <li class="message-item">
                                              <a href="{{ route('admin.formacao.purge', $formacao->id) }}"
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
               {{--  formacao creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de formação do funcionario</h5>
                          
                      <form action="{{ route('admin.formacao.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formFormacao.index')
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
                    <h5 class="card-title">Edição de formacao do funcionario</h5>
                        
                    <form action="{{ route('admin.formacao.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formFormacao.index')
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
@if (session('formacao.create.success'))
<script>
    Swal.fire(
        'Formação do funcionario criada!',
        '',
        'success'
    )

</script>
@endif

@if (session('formacao.create.error'))
<script>
    Swal.fire(
        'Falha ao criar Formação do funcionario!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('formacao.update.success'))
<script>
    Swal.fire(
        'Formação do funcionario actualizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('formacao.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar a Formação do funcionario!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('formacao.delete.success'))
<script>
    Swal.fire(
        'Formação do funcionario eliminada',
        '',
        'success'
    )

</script>
@endif

@if (session('formacao.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar Formação do funcionario!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('formacao.purge.success'))
<script>
    Swal.fire(
        'Formação do funcionario purgada',
        '',
        'success'
    )

</script>
@endif

@if (session('formacao.purge.error'))
<script>
    Swal.fire(
        'Erro ao purgar Formação do funcionario!',
        '',
        'error'
    )

</script>
@endif

 @endsection



