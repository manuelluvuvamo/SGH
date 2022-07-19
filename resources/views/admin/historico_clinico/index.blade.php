@extends('layouts.merge.painel')
@section('titulo', 'Histórico clínico do paciente')
@section('conteudo')





    <div class="pagetitle">
      <h1>Histórico clínico do paciente</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Painel</a></li>
          <li class="breadcrumb-item">Histórico clínico do paciente</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
        @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","HistoricoClinico")->where("nivel",">=",2)->get()->first())
          <div class="d-flex justify-content-end mb-3">
            <a class="btn " href="{{ route('admin.historico_clinico.create',$id) }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar novo histórico</strong>
            </a>
          </div>
          @endif
            {{-- List of historico_clinicos --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Histórico clínico do paciente</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Paciente</th>
                                    <th scope="col">Patologia</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Resultado</th>
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($historico_clinicos as $historico_clinico)
                                <tr>
                                    <th scope="row">{{$historico_clinico->id}}</th>
                                    <td>{{$historico_clinico->nome_paciente}}</td>
                                    <td>{{$historico_clinico->nome_patologia}}</td>
                                    <td>{{$historico_clinico->descricao}}</td>
                                    <td>{{$historico_clinico->resultado}}</td>
                                    
                                   
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
                                              
                                                @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","HistoricoClinico")->where("nivel",">=",3)->get()->first())
                                              <li class="message-item">
                                               
                                                     <a href="{{ route('admin.historico_clinico.edit', $historico_clinico->id) }}"
                                                        class="dropdown-item">
                                                      <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                      Editar
                                                    </a>
                                                   
                                              </li>
                                              @endif
                                              <li>
                                                <hr class="dropdown-divider">
                                              </li>
                                  
                                                @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","HistoricoClinico")->where("nivel",">=",4)->get()->first())
                                              <li class="message-item">
                                                <a href="{{ route('admin.historico_clinico.delete', $historico_clinico->id) }}"
                                                    class="dropdown-item"
                                                    data-confirm="Are you sure that?">
                                                  <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                  Eliminar
                                                </a>
                                              </li>
                                              @endif
                                              <li>
                                                <hr class="dropdown-divider">
                                              
                                                @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","HistoricoClinico")->where("nivel",">=",5)->get()->first())</li>
                                              <li class="message-item">
                                                <a href="{{ route('admin.historico_clinico.purge', $historico_clinico->id) }}"
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
               {{--  historico_clinico creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de histórico clinico</h5>
                          
                      <form action="{{ route('admin.historico_clinico.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formHistoricoClinico.index')
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
                    <h5 class="card-title">Edição de historico_clinico</h5>
                        
                    <form action="{{ route('admin.historico_clinico.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formHistoricoClinico.index')
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
@if (session('historico_clinico.create.success'))
<script>
    Swal.fire(
        'Historico Clínico criado!',
        '',
        'success'
    )

</script>
@endif

@if (session('historico_clinico.create.error'))
<script>
    Swal.fire(
        'Falha ao criar Historico Clínico!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('historico_clinico.update.success'))
<script>
    Swal.fire(
        'Historico Clínico actualizado!',
        '',
        'success'
    )

</script>
@endif

@if (session('historico_clinico.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar o Historico Clínico!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('historico_clinico.delete.success'))
<script>
    Swal.fire(
        'Historico Clínico Eliminado',
        '',
        'success'
    )

</script>
@endif

@if (session('historico_clinico.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar Historico Clínico!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('historico_clinico.purge.success'))
<script>
    Swal.fire(
        'Historico Clínico Purgado',
        '',
        'success'
    )

</script>
@endif

@if (session('historico_clinico.purge.error'))
<script>
    Swal.fire(
        'Erro ao Purgar Historico Clínico!',
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



