<!DOCTYPE html>
<html>

<head>
    <title>Acessar o sistema</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
</head>

<body style="background-color: #c9c547">
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <img id="logo" src="{{ asset('img/logo_1.PNG') }}" class="img-fluid" alt="Logotipo do sistema SchoolFixed">
            </div>
            <div class="col-md-6">
                <h3 class="signin-text mb-3">Entrar no sistema</h3>
                <form action="{{ route('site.login') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <i class="fa fa-envelope"></i>
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        <p class="font-weight-bold text-danger mt-2">{{ $errors->has('email') ? $errors->first('email') : '' }}</p>
                    </div>

                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" class="form-control">
                        <p class="font-weight-bold text-danger mt-2">{{ $errors->has('senha') ? $errors->first('senha') : '' }}</p>
                    </div>

                    {{-- <div class="form-group form-check">
                        <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox">Lembrar-me</label>
                    </div> --}}

                    <button class="btn btn-class">Login</button>

                    {{-- Mensagem de erro de acesso --}}
                    <p class="font-weight-bold text-danger mt-2">{{ isset($erro) && $erro != '' ? $erro : ''}}</p>


                </form>
            </div>
        </div>
    </div>

</body>

</html>
