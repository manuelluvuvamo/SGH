@extends('layouts.merge.painel')
@section('titulo', 'Demissão do funcionario')
@section('conteudo')





    <div class="pagetitle">
      <h1>Demissão do funcionario</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Demissão do funcionario</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
        @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Demissão")->where("nivel",">=",2)->get()->first())
          <div class="d-flex justify-content-end mb-3">
            <a class="btn " href="{{ route('admin.demissao.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar Demissão</strong>
            </a>
          </div>
          @endif
            {{-- List of demissaos --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de Demissão do funcionario</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                 
                                    <th scope="col">#</th>
                                    <th scope="col">Funcionario</th>
                                    <th scope="col">Motivo</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Estado</th>               
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($demissaos as $demissao)
                                <tr>
                                
                                    <th scope="row">{{$demissao->id}}</th>
                                    <td>{{$demissao->nome_funcionario}}</td>
                                    <td>{{$demissao->motivo}}</td>
                                    <td>{{$demissao->descricao}}</td>
                                    <td>@if ($demissao->status == 0)
                                        <span style="color: red;">Desativado</span>
                                    @elseif($demissao->status == 1)
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
                                            
                                            
                                              @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Demissão")->where("nivel",">=",3)->get()->first())
                                            <li class="message-item">
                                             
                                                   <a href="{{ route('admin.demissao.edit', $demissao->id) }}"
                                                      class="dropdown-item">
                                                    <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                    Editar
                                                  </a>
                                                 
                                            </li>
                                            @endif

                                            <li>
                                              <hr class="dropdown-divider">
                                            </li>
                                            
                                              @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Demissão")->where("nivel",">=",4)->get()->first())
                                            <li class="message-item">
                                              <a href="{{ route('admin.demissao.delete', $demissao->id) }}"
                                                  class="dropdown-item"
                                                  data-confirm="Are you sure that?">
                                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                Eliminar
                                              </a>
                                            </li>
                                            @endif
                                            <li>
                                              <hr class="dropdown-divider">
                                              
                                              @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Demissão")->where("nivel",">=",5)->get()->first())</li>
                                            <li class="message-item">
                                              <a href="{{ route('admin.demissao.purge', $demissao->id) }}"
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
               {{--  demissao creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de Demissão do funcionario</h5>
                          
                      <form action="{{ route('admin.demissao.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formDemissao.index')
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
                    <h5 class="card-title">Edição de demissao do funcionario</h5>
                        
                    <form action="{{ route('admin.demissao.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formDemissao.index')
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
@if (session('demissao.create.success'))
<script>
    Swal.fire(
        'Demissão do funcionario criada!',
        '',
        'success'
    )

</script>
@endif

@if (session('demissao.create.error'))
<script>
    Swal.fire(
        'Falha ao criar Demissão do funcionario!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('demissao.update.success'))
<script>
    Swal.fire(
        'Demissão do funcionario actualizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('demissao.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar a Demissão do funcionario!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('demissao.delete.success'))
<script>
    Swal.fire(
        'Demissão do funcionario eliminada',
        '',
        'success'
    )

</script>
@endif

@if (session('demissao.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar Demissão do funcionario!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('demissao.purge.success'))
<script>
    Swal.fire(
        'Demissão do funcionario purgada',
        '',
        'success'
    )

</script>
@endif

@if (session('demissao.purge.error'))
<script>
    Swal.fire(
        'Erro ao purgar Demissão do funcionario!',
        '',
        'error'
    )

</script>
@endif

 @endsection



