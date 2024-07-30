<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connexion</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img class="logo2" src="{{ asset('assets/logo.png')}}" alt="Logo de l'entreprise" />

            <H1 class="navbar-brand fs-1">O'refuge</H1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link  fs-2" aria-current="page" href="login">Se connecter</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <div class="welcome">


    </div>


    <style>
        .welcome {
            width: 100%;
            height: 1000px;
            background-image: url('{{ asset("assets/refuge.jpg") }}');
            background-size: cover;
            /* Pour que l'image couvre tout le div */
        }

        #navbarNav {

            display: flex;
            justify-content: center;

        }

        .logo2 {


            width: 100px;
            height: 100px;
        }
    </style>
</body>

</html>