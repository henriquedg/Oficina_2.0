@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Orçamentos cadastrados</div>

                <div class="card-body">

                    <div class="pb-5">
                        <form action="/search" method="POST" role="search">
                            {{ csrf_field() }}
                            Selecione uma opção para filtrar os resultados: 
                            <br><br><input type="checkbox" name="cliente" value="cliente"> Cliente<br>
                            <input type="checkbox" name="vendedor" value="vendedor"> Vendedor<br><br>

                            <div class="input-group">
                                <input type="text" class="form-control" name="q"
                                    placeholder="Pesquisar nome"> <span class="input-group-btn">

                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search"></span>
                                        Pesquisar
                                    </button>

                                </span>
                            </div>
                            
                            
                        </form>

                        <br>
                        <br>
                        <div class="row pb-5 pl-3">
                            <form action="/search" method="POST" role="search">
                                {{ csrf_field() }}
                                Pesquisa por data:<br><br>
                                <div class="input-group">
                                    De: &nbsp;
                                    <input type="date" class="form-control" name="data1">
                                        &nbsp; até: &nbsp;
                                        <input type="date" class="form-control" name="data2"> 

                                            <button type="submit" class="btn btn-default">
                                                <span class="glyphicon glyphicon-search"></span>
                                                Pesquisar
                                            </button>

                                        
                                    
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>


                    <div class="container">
                        @if(isset($details))
                            <p> Resultados encontrados: <b> {{ $query }} </b></p>
                        <br>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Cliente</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th>Vendedor</th>
                                    <th>Descrição</th>
                                    <th>Valor orçado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->cliente}}</td>
                                    <td>{{$user->data}}</td>
                                    <td>{{$user->hora}}</td>
                                    <td>{{$user->vendedor}}</td>
                                    <td>{{$user->descricao}}</td>
                                    <td>R$ {{$user->valor}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>


                   

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
