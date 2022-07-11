@extends('layouts.merge.painel')
@section('titulo', 'Acesso do funcionario')
@section('conteudo')





    <div class="pagetitle">
      <h1>Acesso do funcionario</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Acesso do funcionario</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
          <div class="d-flex justify-content-end mb-3">
            <a class="btn " href="{{ route('admin.acesso.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar Acesso</strong>
            </a>
          </div>
            {{-- List of acessos --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de Acesso do funcionario</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Funcionario</th>
                                    <th scope="col">Utilizador</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Nível</th>
                                    <th scope="col">Estado</th>               
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($acessos as $acesso)
                                <tr>
                                    <th scope="row">{{$acesso->id}}</th>
                                    <td>{{$acesso->nome_funcionario}}</td>
                                    <td>{{$acesso->nome_usuario}}</td>
                                    <td>{{$acesso->menu}}</td>
                                    <td>
                                    @if ($acesso->nivel == 1)
                                        Leitura
                                    @elseif($acesso->nivel == 2)
                                    Leitura | Escrita
                                    @elseif($acesso->nivel == 3)
                                    Leitura | Escrita | Modificação
                                    @elseif($acesso->nivel == 4)
                                    Leitura | Escrita | Modificação | Deletação
                                    @elseif($acesso->nivel == 5)
                                    Leitura | Escrita | Modificação | Deletação | Deletação permanente
                                    @endif
                                    </td>
                                    <td>@if ($acesso->status == 0)
                                        <span style="color: red;">Desativado</span>
                                    @elseif($acesso->status == 1)
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
                                            
                                
                                            <li class="message-item">
                                             
                                                   <a href="{{ route('admin.acesso.edit', $acesso->id) }}"
                                                      class="dropdown-item">
                                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                    Editar
                                                  </a>
                                                 
                                            </li>

                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                
                                            <li class="message-item">
                                              <a href="{{ route('admin.acesso.delete', $acesso->id) }}"
                                                  class="dropdown-item"
                                                  data-confirm="Are you sure that?">
                                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                Eliminar
                                              </a>
                                            </li>
                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                            <li class="message-item">
                                              <a href="{{ route('admin.acesso.purge', $acesso->id) }}"
                                                  class="dropdown-item"
                                                  data-confirm="Tem certeza que deseja eliminar permanentemente?">
                                               
                                                  Purgar
                                                 
                                              </a>
                                            </li>
                                          
                                
                                
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
               {{--  acesso creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de acesso do funcionario</h5>
                          
                      <form action="{{ route('admin.acesso.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formAcesso.index')
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
                    <h5 class="card-title">Edição de acesso do funcionario</h5>
                        
                    <form action="{{ route('admin.acesso.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formAcesso.index')
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
@if (session('acesso.create.success'))
<script>
    Swal.fire(
        'Acesso do funcionario criada!',
        '',
        'success'
    )

</script>
@endif

@if (session('acesso.create.error'))
<script>
    Swal.fire(
        'Falha ao criar Acesso do funcionario!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('acesso.update.success'))
<script>
    Swal.fire(
        'Acesso do funcionario actualizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('acesso.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar a Acesso do funcionario!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('acesso.delete.success'))
<script>
    Swal.fire(
        'Acesso do funcionario eliminada',
        '',
        'success'
    )

</script>
@endif

@if (session('acesso.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar Acesso do funcionario!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('acesso.purge.success'))
<script>
    Swal.fire(
        'Acesso do funcionario purgada',
        '',
        'success'
    )

</script>
@endif

@if (session('acesso.purge.error'))
<script>
    Swal.fire(
        'Erro ao purgar Acesso do funcionario!',
        '',
        'error'
    )

</script>
@endif

 @endsection



