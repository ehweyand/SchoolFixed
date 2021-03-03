<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>SchoolFixed - @yield('titulo')</title>
    <meta charset="utf-8">
    {{-- Adicione aqui todas as dependências do projeto --}}
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    <link rel="stylesheet" href="{{ asset('js/jquery.css') }}">
</head>

<body>
    @include('site.layouts._partials.topo')
    @yield('conteudo')

</body>

</html>
    