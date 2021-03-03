<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/normaliza.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsivel.css') }}">
    <title>SchoolFixed - Login</title>
</head>
<body>
    <div class="img_inicial">
        <div class="container">
            <div class="row">
                <div class="col-12">
                   <div class="login-central">
                        <div class="login">
                            <div class="login_titulo">
                                <p>SchoolFixed</p>
                            </div>
                            <form class="login_componentes" action={{ route('site.login') }} method="post">
                                @csrf
                                <p>Email:</p>
                                <input type="email" name="email" placeholder="Email">
                                <p>Senha</p>
                                <input type="password" name="senha" placeholder="Senha">
                                <button type="submit" class="login_botao">Entrar</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <script src="/js/jquery.js"></script>
    </footer>
</body>
</html>

