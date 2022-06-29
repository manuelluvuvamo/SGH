@extends('layouts.merge.painel')
@section('titulo', 'Funcionários')
@section('conteudo')





    <div class="pagetitle">
      <h1>Funcionários</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Funcionários</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
          <div class="d-flex justify-content-end mb-3">
            <a class="btn " href="{{ route('admin.funcionario.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar novo funcionário</strong>
            </a>
          </div>
            {{-- List of funcionarios --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de Funcionários</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Gênero</th>
                                    <th scope="col">Data de Nascimento</th>
                                    <th scope="col">Estado civil</th>
                                    <th scope="col">Local de Nascimento</th>
                                    <th scope="col">Nacionalidade</th>
                                    <th scope="col">BI</th>
                                    <th scope="col">Filhação Pai</th>
                                    <th scope="col">Filhação Mãe</th>
                                    <th scope="col">IBAN</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($funcionarios as $funcionario)
                                <tr>
                                    <th scope="row">{{$funcionario->id}}</th>
                                    <td>{{$funcionario->nome}}</td>
                                    <td>{{$funcionario->genero}}</td>
                                    <td>{{$funcionario->dataNascimento}}</td>
                                    <td>{{$funcionario->estadoCivil}}</td>
                                    <td>{{$funcionario->localNascimento}}</td>
                                    <td>{{$funcionario->nacionalidade}}</td>
                                    <td>{{$funcionario->numBi}}</td>
                                    <td>{{$funcionario->filPai}}</td>
                                    <td>{{$funcionario->filMae}}</td>
                                    <td>{{$funcionario->iban}}</td>
                                    <td>{{$funcionario->endereco}}</td>
                                    <td>{{$funcionario->telefone}}</td>
                                    <td>@if ($funcionario->status == 0)
                                        <span style="color: red;">Desativado</span>
                                    @elseif($funcionario->status == 1)
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
                                             
                                                   <a href="{{ route('admin.funcionario.edit', $funcionario->id) }}"
                                                      class="dropdown-item">
                                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                    Editar
                                                  </a>
                                                 
                                            </li>

                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                
                                            <li class="message-item">
                                              <a href="{{ route('admin.funcionario.delete', $funcionario->id) }}"
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
                                              <a href="{{ route('admin.funcionario.purge', $funcionario->id) }}"
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
               {{--  funcionario creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de funcionário</h5>
                          
                      <form action="{{ route('admin.funcionario.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formFuncionario.index')
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
                    <h5 class="card-title">Edição de funcionário</h5>
                        
                    <form action="{{ route('admin.funcionario.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formFuncionario.index')
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
@if (session('funcionario.create.success'))
<script>
    Swal.fire(
        'Funcionário criado!',
        '',
        'success'
    )

</script>
@endif

@if (session('funcionario.create.error'))
<script>
    Swal.fire(
        'Falha ao criar Funcionário!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('funcionario.update.success'))
<script>
    Swal.fire(
        'Funcionário actualizado!',
        '',
        'success'
    )

</script>
@endif

@if (session('funcionario.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar o funcionário!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('funcionario.delete.success'))
<script>
    Swal.fire(
        'Funcionário eliminada',
        '',
        'success'
    )

</script>
@endif

@if (session('funcionario.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar Funcionário!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('funcionario.purge.success'))
<script>
    Swal.fire(
        'Funcionário purgado',
        '',
        'success'
    )

</script>
@endif

@if (session('funcionario.purge.error'))
<script>
    Swal.fire(
        'Erro ao purgar funcionário!',
        '',
        'error'
    )

</script>
@endif

 @endsection



