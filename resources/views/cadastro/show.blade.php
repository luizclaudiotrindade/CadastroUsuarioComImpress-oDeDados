@extends('layouts.app')
@section('content')
    
<div class="container">
    <div class="col-md-12">
    <h1 class="text-center">Você está vendo os detalhes do nosso produto</h1><br>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cpf </th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"> </th>
                        @foreach($usuarios as $item)
{{$item}}
@endforeach
                    </tr>
                </tbody>
            </table> 
        </div>
    </div>
</div>
@endsection