@extends('layouts.merge.painel')
@section('titulo', 'Lista de Utilizadores')
@section('conteudo')





    <div class="pagetitle">
      <h1>Utilizadores</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Painel</a></li>
          <li class="breadcrumb-item">Utilizadores</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
         {{--  <div class="d-flex justify-content-end mb-3">
            <a class="btn " href="{{ route('admin.user.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar novo utilizador</strong>
            </a>
          </div> --}}
            {{-- List of utilizadores --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de utilizadores</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tipo de Conta</th>
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->tipo_conta}}</td>
                                   
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
                                  
                                              <li class="message-item">
                                               
                                                     <a href="{{ route('admin.user.edit', $user->id) }}"
                                                        class="dropdown-item">
                                                      <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                      Editar
                                                    </a>
                                                   
                                              </li>
                                              <li>
                                                <hr class="dropdown-divider">
                                              </li>
                                  
                                              <li class="message-item">
                                                <a href="{{ route('admin.user.delete', $user->id) }}"
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
                                                <a href="{{ route('admin.user.purge', $user->id) }}"
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
               {{--  user creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de user</h5>
                          
                      <form action="{{ route('admin.user.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formUser.index')
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
                    <h5 class="card-title">Edição de utilizador</h5>
                        
                    <form action="{{ route('admin.user.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formUser.index')
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
@if (session('user.create.success'))
<script>
    Swal.fire(
        'Utilizador criado!',
        '',
        'success'
    )

</script>
@endif

@if (session('user.create.error'))
<script>
    Swal.fire(
        'Falha ao criar utilizador!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('user.update.success'))
<script>
    Swal.fire(
        'utilizador actualizado!',
        '',
        'success'
    )

</script>
@endif

@if (session('user.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar o utilizador!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('user.delete.success'))
<script>
    Swal.fire(
        'Utilizador Eliminado',
        '',
        'success'
    )

</script>
@endif

@if (session('user.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar utilizador!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('user.purge.success'))
<script>
    Swal.fire(
        'Utilizador Purgado',
        '',
        'success'
    )

</script>
@endif

@if (session('user.purge.error'))
<script>
    Swal.fire(
        'Erro ao Purgar utilizador!',
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

</script>

 @endsection



