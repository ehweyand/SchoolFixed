<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />


    <title>Sistema SchoolFixed</title>
</head>

<style>
    /* Style inputs, select elements and textareas */
    input[type=text],
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        resize: vertical;
    }

    /* Style the label to display next to the inputs */
    label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    /* Style the buttons */
    .button-generic {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
    }

    /* Style the container */
    .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }

    /* Floating column for labels: 25% width */
    .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    /* Floating column for inputs: 75% width */
    .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

        .col-25,
        .col-75,
        input[type=submit],
        button.button-generic {
            width: 100%;
            margin-top: 8px;
        }

        .button-return {
            margin: 0 !important;
        }
    }

    * {
        font-family: sans-serif;
        /* Change your font family */
    }

    .content-table {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .content-table thead tr {
        background-color: #009879;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }

    .content-table th,
    .content-table td {
        padding: 12px 15px;
    }

    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #009879;
    }

    .content-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
    }

    body {
        font-family: "Open Sans", sans-serif;
        line-height: 1.25;
    }

    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        table-layout: fixed;
    }

    table caption {
        font-size: 1.5em;
        margin: .5em 0 .75em;
    }

    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    table th,
    table td {
        padding: .625em;
        text-align: center;
    }

    table th {
        font-size: .85em;
        letter-spacing: .1em;
        text-transform: uppercase;
    }

    @media screen and (max-width: 600px) {
        table {
            border: 0;
        }

        table caption {
            font-size: 1.3em;
        }

        table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }

        table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;

        }

        table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: center;
        }

        table td::before {
            /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
        }

        table td:last-child {
            border-bottom: 0;
        }
    }

    .button-return {
        margin-right: 15px;
    }

    .red-text {
        color: red;
        font-weight: bold;
    }

    .green-text {
        color: green;
        font-weight: bold;
    }

    td a {
        cursor: pointer;
    }

    td a:hover {
        text-decoration: underline;
    }

    .centered {
        display: flex;
        justify-content: center;
    }

</style>

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
                                    <a href="{{ route('setor.index')}}" class="nav__dropdown-item">Setor</a>
                                    <a href="{{ route('tipo_servico.index')}}" class="nav__dropdown-item">Tipo de serviço</a>
                                    <a href="#" class="nav__dropdown-item">PlaceHolder</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nav__items">
                        <h3 class="nav__subtitle">Outras opções</h3>

                        <div class="nav__dropdown">
                            <a href="#" class="nav__link">
                                <i class='bx bx-bell nav__icon'></i>
                                <span class="nav__name">Item 1</span>
                                <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                            </a>

                            <div class="nav__dropdown-collapse">
                                <div class="nav__dropdown-content">
                                    <a href="#" class="nav__dropdown-item">SubItem 1.1</a>
                                    <a href="#" class="nav__dropdown-item">SubItem 1.2</a>
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
    <div class="container">
        <form action="{{ route('setor.update', ['setor' => $setor->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-25">
                    <label for="subject">Descrição do setor:</label>
                </div>
                <div class="col-75">
                    <input type="text" id="descricao" name="descricao" value="{{ $setor->descricao ?? old('peso') }}">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}
                </div>
            </div>
            <div class="row">
                <input type="submit" class="button-generic" value="Confirmar">
            </div>
        </form>
        <div class="row centered">
            <button class="button-generic button-return" onclick="window.location='{{ url('app/setor') }}'">Voltar</button>
        </div>
    </div>
    </div>

    <!--========== SIDEBAR MAIN JS ==========-->
    <script src="{{ asset('js/sidebar.js')}}"></script>
</body>

</html>
