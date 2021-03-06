<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">

    <link rel="icon" href="{{ asset('img/favicon.ico') }}">
    
    <title>Sistema SchoolFixed</title>
</head>
<body>
    <!--========== HEADER ==========-->
    <header class="header">
        <div class="header__container">

            <!-- <a href="#" class="header__logo">SchoolFixed</a> -->

            <!-- <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class='bx bx-search header__icon'></i>
                </div> -->

            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>
        </div>
    </header>

    <!--========== NAV ==========-->
    <div class="nav" id="navbar">
        <nav class="nav__container">
            <div>
                <a href="#" class="nav__link nav__logo">
                    <i class='bx bxs-school nav__icon'></i>
                    <span class="nav__logo-name">SchoolFixed</span>
                </a>

                <div class="nav__list">
                    <div class="nav__items">
                        <h3 class="nav__subtitle">Administração</h3>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-edit nav__icon'></i>
                                <span class="nav__name">Cadastros</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>
                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="{{ route('funcionario.index')}}" class="nav__dropdown-item">Funcionário</a>
                                    <a href="{{ route('instituicao.index')}}" class="nav__dropdown-item">Instituição</a>
                                    <a href="{{ route('ordem_servico.index')}}" class="nav__dropdown-item">Ordem de Serviço</a>
                                    <a href="{{ route('servico.index')}}" class="nav__dropdown-item">Serviço</a>
                                    <a href="{{ route('setor.index')}}" class="nav__dropdown-item">Setor</a>                    
                                    <a href="{{ route('tipo_servico.index')}}" class="nav__dropdown-item">Tipo de serviço</a>
                                    <a href="{{ route('usuario.index')}}" class="nav__dropdown-item">Usuário</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nav__items">
                        <h3 class="nav__subtitle">Outras opções</h3>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-bell nav__icon'></i>
                                <span class="nav__name">Relatórios</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="{{ route('app.logs')}}" class="nav__dropdown-item">Logs da aplicação</a>
                                    <a href="{{ route('app.audit')}}" class="nav__dropdown-item">Visualização da auditoria</a>
                                    <a href="#" class="nav__dropdown-item">SubItem 1.3</a>
                                    <a href="#" class="nav__dropdown-item">SubItem 1.4</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('app.sair') }}" class="nav__link nav__logout">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Sair</span>
            </a>
        </nav>
    </div>

    <!--========== CONTENTS ==========-->
    <main>
        <section>
        <h1>Informações de sensores</h1>
        <h3>Escola XYZ</h3>
        <h4>Sensor de distância - Movimentação em entrada de depósito de materiais</h4>
        <div class="chart-sensor">
            <iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/1056351/charts/1?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&type=line&update=15"></iframe>


        </div>

        </section>
    </main>

    <!--========== SIDEBAR MAIN JS ==========-->
    <script src="{{ asset('js/sidebar.js')}}"></script>
</body>
</html>
