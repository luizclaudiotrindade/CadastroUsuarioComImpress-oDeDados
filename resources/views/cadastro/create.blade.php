<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cultura</title>

    <!-- Scripts 
    
    <script src="{{ asset('js/app.js') }}" defer></script>
-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script>
        $(document).ready(function () { 
            var $seuCampoCpf = $("#CPF");
            $seuCampoCpf.mask('000.000.000-00', {reverse: true});
        });
        
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Cadastro Cultura
                    
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                   
                    <ul class="navbar-nav ml-auto">
                    <!--Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create') }}">{{ __('Cadastrar Usuário') }}</a>
                    </li>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastro Usuário</div>

                <div class="card-body">
                    {!! Form::open(['route','cadastro.store']) !!}
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nome</label>
                            <input type="text" name="nome" class="form-control" id="exampleFormControlInput1" value="{{old('nome')}}" placeholder="Digite seu nome">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">CPF</label>
                            <input type="text"  name ="cpf" class="form-control cpf-mask" placeholder="EX: 00000000000"  value="{{old('cpf')}}" id="CPF" placeholder="Insira seu Cpf">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Selecione uma opção</label>
                            <select class="form-control" name="opcao_id" value="{{old('opcao_id')}}" id="exampleFormControlSelect1">
                            @foreach($opcao as $item)
                                <option value="{{$item->id}}">{{$item->desc_nome}}</option>
                            @endforeach
                            </select>

                        </div>
                        <input type="submit" value="Cadastrar" class="btn btn-primary">
                    {{Form::close()}}
                </div>
            </div>
            
        </div>
    </div>
</div>
</body>
</html>

