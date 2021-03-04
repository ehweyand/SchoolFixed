<!DOCTYPE html>
<html>

<head>
    <title>Acessar o sistema</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
</head>

<body style="background-color: #c9c547">
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3">
                <img src="{{ asset('img/logo_1.PNG') }}" class="img-fluid" alt="Logotipo do sistema SchoolFixed">
            </div>
            <div class="col-md-6">
                <h3 class="signin-text mb-3">Entrar no sistema</h3>
                <form action="{{ route('site.login') }}" method="post">
                @csrf

                    <div class="form-group">
                        <label for="email">E-Mail:</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" class="form-control">
                    </div>

                    {{-- <div class="form-group form-check">
                        <input type="checkbox" name="checkbox" class="form-check-input" id="checkbox">
                        <label class="form-check-label" for="checkbox">Lembrar-me</label>
                    </div> --}}
                    
                    <button class="btn btn-class">Login</button>
                    @if(isset($_GET['erro']) && $_GET['erro'] == 1)
                        <p style="color: red">Insira as credenciais corretas</p>
                    @endif
                    <p></p>
                </form>
            </div>
        </div>
    </div>

</body>

</html>