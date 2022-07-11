@extends('layouts.merge.painel')
@section('titulo', 'Admissão do funcionario')
@section('conteudo')





    <div class="pagetitle">
      <h1>Admissão do funcionario</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Admissão do funcionario</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
        @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Admissão")->where("nivel",">=",2)->get()->first())
          <div class="d-flex justify-content-end mb-3">
            <a class="btn " href="{{ route('admin.admissao.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar Admissão</strong>
            </a>
          </div>
          @endif
            {{-- List of admissaos --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de Admissão do funcionario</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                 
                                    <th scope="col">#</th>
                                    <th scope="col">Funcionario</th>
                                    <th scope="col">Data de admissão</th>
                                    <th scope="col">Cargo inicial</th>
                                    <th scope="col">Salário inicial</th>
                                    <th scope="col">Nº de dependentes</th>
                                    <th scope="col">Nº de registro</th>
                                    <th scope="col">Estado</th>               
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($admissaos as $admissao)
                                <tr>
                                
                                    <th scope="row">{{$admissao->id}}</th>
                                    <td>{{$admissao->nome_funcionario}}</td>
                                    <td>{{$admissao->dataAdmissao}}</td>
                                    <td>{{$admissao->cargoInicial}}</td>
                                    <td>{{$admissao->salarioInicia}}</td>
                                    <td>{{$admissao->numDependentes}}</td>
                                    <td>{{$admissao->numRegistro}}</td>
                                    <td>@if ($admissao->status == 0)
                                        <span style="color: red;">Desativado</span>
                                    @elseif($admissao->status == 1)
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
                                            
                                            
                                            @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Admissão")->where("nivel",">=",3)->get()->first())
                                            <li class="message-item">
                                             
                                                   <a href="{{ route('admin.admissao.edit', $admissao->id) }}"
                                                      class="dropdown-item">
                                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                    Editar
                                                  </a>
                                                 
                                            </li>
                                            @endif

                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                            
                                            @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Admissão")->where("nivel",">=",4)->get()->first())
                                            <li class="message-item">
                                              <a href="{{ route('admin.admissao.delete', $admissao->id) }}"
                                                  class="dropdown-item"
                                                  data-confirm="Are you sure that?">
                                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                Eliminar
                                              </a>
                                            </li>
                                            @endif
                                            <li>
                                              <hr class="dropdown-divider">
                                              
                                            @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Admissão")->where("nivel",">=",5)->get()->first())</li>
                                            <li class="message-item">
                                              <a href="{{ route('admin.admissao.purge', $admissao->id) }}"
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
               {{--  admissao creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de Admissão do funcionario</h5>
                          
                      <form action="{{ route('admin.admissao.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formAdmissao.index')
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
                    <h5 class="card-title">Edição de admissao do funcionario</h5>
                        
                    <form action="{{ route('admin.admissao.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formAdmissao.index')
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
@if (session('admissao.create.success'))
<script>
    Swal.fire(
        'Admissão do funcionario criada!',
        '',
        'success'
    )

</script>
@endif

@if (session('admissao.create.error'))
<script>
    Swal.fire(
        'Falha ao criar Admissão do funcionario!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('admissao.update.success'))
<script>
    Swal.fire(
        'Admissão do funcionario actualizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('admissao.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar a Admissão do funcionario!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('admissao.delete.success'))
<script>
    Swal.fire(
        'Admissão do funcionario eliminada',
        '',
        'success'
    )

</script>
@endif

@if (session('admissao.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar Admissão do funcionario!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('admissao.purge.success'))
<script>
    Swal.fire(
        'Admissão do funcionario purgada',
        '',
        'success'
    )

</script>
@endif

@if (session('admissao.purge.error'))
<script>
    Swal.fire(
        'Erro ao purgar Admissão do funcionario!',
        '',
        'error'
    )

</script>
@endif

 @endsection



