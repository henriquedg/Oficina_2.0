@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Orçamentos cadastrados</div>

                <div class="card-body">
                    @foreach($users as $user)
                        <div class="row pb-5 pl-3">

                            ID: {{$user->id}}<br>
                            Cliente: {{$user->cliente}}<br>
                            Data: {{$user->data}}<br>
                            Hora: {{$user->hora}}<br>
                            Vendedor: {{$user->vendedor}}<br>
                            Descrição: {{$user->descricao}}<br>
                            Valor orçado: R$ {{$user->valor}}<br>
                            
                        </div>
                        
                    @endforeach

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
