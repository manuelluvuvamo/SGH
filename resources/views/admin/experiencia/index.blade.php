@extends('layouts.merge.painel')
@section('titulo', 'Experiência do funcionario')
@section('conteudo')





    <div class="pagetitle">
      <h1>Experiência do funcionario</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Experiência do funcionario</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
          <div class="d-flex justify-content-end mb-3">
            <a class="btn " href="{{ route('admin.experiencia.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar Experiência</strong>
            </a>
          </div>
            {{-- List of experiencias --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de Experiência do funcionario</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Funcionario</th>
                                    <th scope="col">Instituição</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Função</th>
                                    <th scope="col">Data de início</th>
                                    <th scope="col">Data de término</th>
                                    <th scope="col">Estado</th>               
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($experiencias as $experiencia)
                                <tr>
                                    <th scope="row">{{$experiencia->id}}</th>
                                    <td>{{$experiencia->nome_funcionario}}</td>
                                    <td>{{$experiencia->instituicao}}</td>
                                    <td>{{$experiencia->cargo}}</td>
                                    <td>{{$experiencia->funcao}}</td>
                                    <td>{{$experiencia->dataInicio}}</td>
                                    <td>{{$experiencia->dataFim}}</td>
                                    <td>@if ($experiencia->status == 0)
                                        <span style="color: red;">Desativado</span>
                                    @elseif($experiencia->status == 1)
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
                                             
                                                   <a href="{{ route('admin.experiencia.edit', $experiencia->id) }}"
                                                      class="dropdown-item">
                                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                    Editar
                                                  </a>
                                                 
                                            </li>

                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                
                                            <li class="message-item">
                                              <a href="{{ route('admin.experiencia.delete', $experiencia->id) }}"
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
                                              <a href="{{ route('admin.experiencia.purge', $experiencia->id) }}"
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
               {{--  experiencia creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de experiencia do funcionario</h5>
                          
                      <form action="{{ route('admin.experiencia.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formExperiencia.index')
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
                    <h5 class="card-title">Edição de experiencia do funcionario</h5>
                        
                    <form action="{{ route('admin.experiencia.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formExperiencia.index')
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
@if (session('experiencia.create.success'))
<script>
    Swal.fire(
        'Experiência do funcionario criada!',
        '',
        'success'
    )

</script>
@endif

@if (session('experiencia.create.error'))
<script>
    Swal.fire(
        'Falha ao criar experiência do funcionario!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('experiencia.update.success'))
<script>
    Swal.fire(
        'Experiência do funcionario actualizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('experiencia.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar a experiência do funcionario!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('experiencia.delete.success'))
<script>
    Swal.fire(
        'Experiência do funcionario eliminada',
        '',
        'success'
    )

</script>
@endif

@if (session('experiencia.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar experiência do funcionario!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('experiencia.purge.success'))
<script>
    Swal.fire(
        'Experiência do funcionario purgada',
        '',
        'success'
    )

</script>
@endif

@if (session('experiencia.purge.error'))
<script>
    Swal.fire(
        'Erro ao purgar experiência do funcionario!',
        '',
        'error'
    )

</script>
@endif

 @endsection



