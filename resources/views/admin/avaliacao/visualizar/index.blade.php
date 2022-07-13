@extends('layouts.merge.painel')
@section('titulo', 'Lista  de Avaliações')
@section('conteudo')
 
    <div class="pagetitle">
        <h1>  Visualizar Avaliação <b>{{ $codigo->id }}</b></h1>
            <p>Avaliador: {{ $codigo->name }} <br> Funcionário: {{ $codigo->nome }}</p>
           
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Painel</a></li>
            <li class="breadcrumb-item">Avaliações</li>
            <li class="breadcrumb-item active">visualizar</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
     
    <div class="card">
        <div class="card-body table-responsive">
            <h5 class="card-title">Lista de avaliacaos</h5>
                    <!-- Table with stripped rows -->
                <table class=" datatable ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Critério</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Descrição</th>
                    </tr>
                    </thead>
                    <tbody>
        
                    @foreach ($avaliacaos as $avaliacao)
                    <tr>
                        <th scope="row">{{$avaliacao->id}}</th>
                        <td>{{$avaliacao->criterio}}</td>
                        <td>{{$avaliacao->nivel}}</td>
                        <td>{{$avaliacao->descricao}}</td>
                      
                       
                     
                    </tr>
                    @endforeach
         
                  
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->
        </div>
        </div>

    <script src="/js/datatables/jquery-3.5.1.js"></script>
  


@endsection

