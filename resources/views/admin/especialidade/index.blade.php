@extends('layouts.merge.painel')
@section('titulo', 'Lista de Especialidades')
@section('conteudo')





    <div class="pagetitle">
      <h1>Especialidades</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Painel</a></li>
          <li class="breadcrumb-item">Especialidades</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
        @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Especialidade")->where("nivel",">=",2)->get()->first())
          <div class="d-flex justify-content-end mb-3">
            <a class="btn " href="{{ route('admin.especialidade.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar nova especialidade</strong>
            </a>
          </div>
          @endif
            {{-- List of Especialidades --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de Especialidades</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($especialidades as $especialidade)
                                <tr>
                                    <th scope="row">{{$especialidade->id}}</th>
                                    <td>{{$especialidade->nome}}</td>
                                    <td>@if ($especialidade->status == 0)
                                      <span style="color: red;">Desativado</span>
                                  @elseif($especialidade->status == 1)
                                     <span style="color: green;">Activo</span>
                                  @endif</td>
                                   
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
                                  

                                               @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Especialidade")->where("nivel",">=",3)->get()->first())
                                              <li class="message-item">
                                               
                                                     <a href="{{ route('admin.especialidade.edit', $especialidade->id) }}"
                                                        class="dropdown-item">
                                                      <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                      Editar
                                                    </a>
                                                   
                                              </li>
                                              @endif
                                              <li>
                                                <hr class="dropdown-divider">
                                              </li>
                                  

                                               @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Especialidade")->where("nivel",">=",4)->get()->first())
                                              <li class="message-item">
                                                <a href="{{ route('admin.especialidade.delete', $especialidade->id) }}"
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

                                               @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Especialidade")->where("nivel",">=",5)->get()->first())
                                              <li class="message-item">
                                                <a href="{{ route('admin.especialidade.purge', $especialidade->id) }}"
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
               {{--  especialidade creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de especialidade</h5>
                          
                      <form action="{{ route('admin.especialidade.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formEspecialidade.index')
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
                    <h5 class="card-title">Edição de especialidade</h5>
                        
                    <form action="{{ route('admin.especialidade.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formEspecialidade.index')
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
@if (session('especialidade.create.success'))
<script>
    Swal.fire(
        'Especialidade criada!',
        '',
        'success'
    )

</script>
@endif

@if (session('especialidade.create.error'))
<script>
    Swal.fire(
        'Falha ao criar especialidade!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('especialidade.update.success'))
<script>
    Swal.fire(
        'Especialidade actualizada!',
        '',
        'success'
    )

</script>
@endif

@if (session('especialidade.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar a especialidade!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('especialidade.delete.success'))
<script>
    Swal.fire(
        'Especialidade Eliminada',
        '',
        'success'
    )

</script>
@endif

@if (session('especialidade.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar especialidade!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('especialidade.purge.success'))
<script>
    Swal.fire(
        'Especialidade Purgada',
        '',
        'success'
    )

</script>
@endif

@if (session('especialidade.purge.error'))
<script>
    Swal.fire(
        'Erro ao Purgar especialidade!',
        '',
        'error'
    )

</script>
@endif

<script>
  $(document).ready(function() {

      //start delete
      $('a[data-confirm]').click(function(ev) {
          var href = $(this).attr('href');
          if (!$('#confirm-delete').length) {
              $('table').append(
                  '<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel">Eliminar os dados</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body table-responsive">Tem certeza que pretende elimnar?</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> <a  class="btn btn-info" id="dataConfirmOk">Eliminar</a> </div></div></div></div>'
              );
          }
          $('#dataConfirmOk').attr('href', href);
          $('#confirm-delete').modal({
              shown: true
          });
          return false;

      });
      //end delete
  });

 @endsection



