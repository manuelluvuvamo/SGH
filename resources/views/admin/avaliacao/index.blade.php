@extends('layouts.merge.painel')
@section('titulo', 'Lista  de Avaliações')
@section('conteudo')





    <div class="pagetitle">
      <h1>  Avaliações</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Painel</a></li>
          <li class="breadcrumb-item">Avaliações</li>
          <li class="breadcrumb-item active">{{$page}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
   

    @isset($page)
        @if ($page=="lista")
        @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Avaliações")->where("nivel",">=",2)->get()->first())
          <div class="d-flex justify-content-end mb-3">
            <a class="btn " href="{{ route('admin.avaliacao.create') }}" style="background-color: #012970;">
                <strong class="text-light">Adicionar nova  avaliação</strong>
            </a>
          </div>
        @endif
            {{-- List of avaliacaos --}}
            <section class="section">
                <div class="row">
                <div class="col-lg-12">
        
                    <div class="card">
                    <div class="card-body table-responsive">
                        <h5 class="card-title">Lista de avaliacaos</h5>
                                <!-- Table with stripped rows -->
                            <table class=" datatable ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Funcionário</th>
                                    <th scope="col">Avaliador</th>
                                    <th scope="col">Data de avaliação</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Accções</th>
                                </tr>
                                </thead>
                                <tbody>
                              @foreach ($avaliacaos as $avaliacao)
                                <tr>
                                    <th scope="row">{{$avaliacao->id}}</th>
                                    <td>{{$avaliacao->nome}}</td>
                                    <td>{{$avaliacao->name}}</td>
                                    <td>{{$avaliacao->created_at}}</td>
                                    <td>@if ($avaliacao->status == 0)
                                      <span style="color: red;">Desativado</span>
                                  @elseif($avaliacao->status == 1)
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
                                  
                                              
                                                 @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Avaliações")->where("nivel",">=",3)->get()->first())
                                                <li class="message-item">
                                               
                                                     <a href="{{ route('admin.avaliacao.edit', $avaliacao->id) }}"
                                                        class="dropdown-item">
                                                      <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                      Editar
                                                    </a>
                                                   
                                              </li>
                                              @endif
                                              <li>
                                                <hr class="dropdown-divider">
                                              </li>
                                              
                                                 @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Avaliações")->where("nivel",">=",1)->get()->first())
                                              <li class="message-item">
                                               
                                                <a href="{{ route('admin.avaliacao.visualizar', $avaliacao->id) }}"
                                                   class="dropdown-item">
                                                 <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                                 Visualizar
                                               </a>
                                              
                                         </li>
                                         @endif
                                         <li>
                                           <hr class="dropdown-divider">
                                         </li>
                                  
                                              
                                             @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Avaliações")->where("nivel",">=",4)->get()->first())
                                         <li class="message-item">
                                                <a href="{{ route('admin.avaliacao.delete', $avaliacao->id) }}"
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
                                              
                                                 @if (Auth::user()->tipo_conta == "Administrador" || \App\Models\Acesso::where("idUser",Auth::user()->id)->where("menu","Avaliações")->where("nivel",">=",5)->get()->first())
                                              <li class="message-item">
                                                <a href="{{ route('admin.avaliacao.purge', $avaliacao->id) }}"
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
               {{--  avaliacao creation --}}
            <section class="section">
              <div class="row">
              <div class="col-lg-12">
      
                  <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Cadastro de avaliacao</h5>
                          
                      <form action="{{ route('admin.avaliacao.store')}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>

                        @csrf
                        @include('forms._formAvaliacao.index')
                        <div class="col-md-12 row" id="dd"></div>
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
          <script>
            const selecionados = [];
    
            function selecionar() {
                criterio = document.getElementById("idCriterio");
                let id = criterio.options[criterio.selectedIndex].value;
                let value = criterio.options[criterio.selectedIndex].innerHTML;
                adicionar(parseInt(id), value);
            }
    
            function adicionar(id, value) {
                let existente = 0;
                let existente2 = 0;
                selecionados.push(id);
                let df = selecionados.forEach(element => {
                    if (element == id && existente == 0) {
                        existente = 1
                    } else if (existente == 1 && element == id) {
                        selecionados.pop();
                        existente = 0;
                        existente2 = 1;
                        return false;
                    }
                });
                if (existente2) {
                    existente2 = 0;
                    return 0;
                }
                let numero = Math.floor(Math.random() * 100);
                let componente = document.getElementById("dd");
                let elemento = document.createElement("div");
                elemento.classList.add("row");
                elemento.id = `div${numero}`;
                elemento.innerHTML = `@include('forms._formAvaliacao2.index', ['numero' => rand(1, 100)])`;
                // console.log(((elemento.innerHTML).split('remover')[1]).split("'")[0]);
                // elemento.appendChild("<h1>sss</h1>");
                elemento.innerHTML = `
                <div class="form-group col-sm-4">
        <label for="idCriterio">{{ __('Criterio de Avaliação') }}</label>
        <select type="text" class="form-control border-secondary" name="avaliacao[${numero}][idCriterio]" select required>
                <option value="${ id }">
                    ${ value }</option>
        </select>
    </div>
    
    <div class="form-group col-sm-4">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class="form-control" placeholder="Digite a descrição" name="avaliacao[${numero}][descricao]"
            value="{{ isset($avaliacao->descricao) ? $avaliacao->descricao : '' }}" required>
    </div>
    
    <div class="form-group col-sm-3">
        <label for="idNivel">{{ __('Nivel de Avaliação') }}</label>
        <select type="text" class="form-control border-secondary" name="avaliacao[${numero}][idNivel]" required>
            @isset($avaliacao)
                <option value="{{ isset($avaliacao->idNivel) ? $avaliacao->idNivel : '' }}">
                    {{ $avaliacao->nivel }}</option>
            @else
                <option disabled value="" selected>Selecione o Nivel de Avaliação</option>
            @endisset
            @if (isset($nivels))
            
                @foreach ($nivels as $nivel)
                    <option value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
                @endforeach
            
            @else
                <option disabled value="" selected>não existem Niveis de Avaliações cadastrados</option>
            @endif
           
        </select>
    </div>
    
    <div class=" col-sm-1 ">
        <i style="color:#003B76" class="bi bi-x-circle"
        id="remover${numero} " onclick="remover(div${numero}, ${ id } )"
        ></i>
                `;
                componente.appendChild(elemento)
            }
    
            function remover(id, criterio) {
                let componente = document.getElementById("dd");
                selecionados.splice(selecionados.indexOf(criterio), 1);
                id.remove();
            }
        </script>
        @elseif($page=="editar")
          <section class="section">
            <div class="row">
            <div class="col-lg-12">
    
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edição de avaliacao</h5>
                        
                    <form action="{{ route('admin.avaliacao.update',$id)}}" method="post"  enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                      @method('put')
                      @csrf
                      @include('forms._formAvaliacao.index')
                      <div class="col-md-12 row" id="dd"></div>
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
          <script>
            let numero;
            let componente;
            let elemento;
            const selecionados = [];
    
            function selecionar() {
                criterio = document.getElementById("idCriterio");
                let id = criterio.options[criterio.selectedIndex].value;
                let value = criterio.options[criterio.selectedIndex].innerHTML;
                adicionar(parseInt(id), value);
            }
    
            function adicionar(id, value, descricao) {
                let existente = 0;
                let existente2 = 0;
                selecionados.push(id);
                let df = selecionados.forEach(element => {
                    if (element == id && existente == 0) {
                        existente = 1
                    } else if (existente == 1 && element == id) {
                        selecionados.pop();
                        existente = 0;
                        existente2 = 1;
                        return false;
                    }
                });
                if (existente2) {
                    existente2 = 0;
                    return 0;
                }
    
                numero = Math.floor(Math.random() * 100);
                componente = document.getElementById("dd");
                elemento = document.createElement("div");
                elemento.classList.add("row");
                elemento.id = `div${numero}`;
                elemento.innerHTML = `@include('forms._formAvaliacao2.index', ['numero' => rand(1, 100)])`;
                // console.log(((elemento.innerHTML).split('remover')[1]).split("'")[0]);
                // elemento.appendChild("<h1>sss</h1>");
                elemento.innerHTML = `
                <div class="form-group col-sm-4">
        <label for="idCriterio">{{ __('Criterio de Avaliação') }}</label>
        <select type="text" class="form-control border-secondary" name="avaliacao[${numero}][idCriterio]"
            id="avaliacao[${numero}][idCriterio]" select required>
                <option value="${ id }">
                    ${ value }</option>
        </select>
    </div>
    
    <div class="form-group col-sm-4">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class="form-control" placeholder="Digite o Nome da Area" name="avaliacao[${numero}][descricao]"
            value="${descricao ? descricao : ''}" required>
    </div>
    
    <div class="form-group col-sm-3">
        <label for="idNivel">{{ __('Nivel de Avaliação') }}</label>
        <select type="text" class="form-control border-secondary" name="avaliacao[${numero}][idNivel]" required>
            @isset($avaliacao)
                <option value="{{ isset($avaliacao->idNivel) ? $avaliacao->idNivel : '' }}">
                    {{ $avaliacao->nivel }}</option>
            @else
                <option disabled value="" selected>Selecione o Nivel de Avaliação</option>
            @endisset
            @if (isset($nivels))
            
                @foreach ($nivels as $nivel)
                    <option value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
                @endforeach
            
            @else
                <option disabled value="" selected>não existem Niveis de Avaliações cadastrados</option>
            @endif
           
        </select>
    </div>
    
    <div class=" col-sm-1 ">
        <i style="color:#003B76" class="bi bi-x-circle"
        id="remover${numero} " onclick="remover(div${numero}, ${id})"
        ></i>
                `;
                componente.appendChild(elemento)
            }
    
            function remover(id, criterio) {
                let componente = document.getElementById("dd");
                selecionados.splice(selecionados.indexOf(criterio), 1);
                id.remove();
            }
        </script>
    
    
        <script>
            let avaliacaos = (@php echo $avaliacaos @endphp)
            avaliacaos.forEach(item => {
                adicionar(item.idCriterio, item.criterio, item.descricao);
            })
        </script>
        @endif
    @endisset

        {{-- CREATION --}}
@if (session('avaliacao.create.success'))
<script>
    Swal.fire(
        'Avaliação criado!',
        '',
        'success'
    )

</script>
@endif

@if (session('avaliacao.create.error'))
<script>
    Swal.fire(
        'Falha ao criar Avaliação!',
        '',
        'error'
    )

</script>
@endif

{{-- EDITION --}}
@if (session('avaliacao.update.success'))
<script>
    Swal.fire(
        'Avaliação actualizado!',
        '',
        'success'
    )

</script>
@endif

@if (session('avaliacao.update.error'))
<script>
    Swal.fire(
        'Falha ao actualizar o Avaliação!',
        '',
        'error'
    )

</script>
@endif

{{-- DELETE --}}

@if (session('avaliacao.delete.success'))
<script>
    Swal.fire(
        'Avaliação Eliminado',
        '',
        'success'
    )

</script>
@endif

@if (session('avaliacao.delete.error'))
<script>
    Swal.fire(
        'Erro ao eliminar Avaliação!',
        '',
        'error'
    )

</script>
@endif


{{--  PURGE --}}

@if (session('avaliacao.purge.success'))
<script>
    Swal.fire(
        'Avaliação Purgado',
        '',
        'success'
    )

</script>
@endif

@if (session('avaliacao.purge.error'))
<script>
    Swal.fire(
        'Erro ao Purgar Avaliação!',
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



