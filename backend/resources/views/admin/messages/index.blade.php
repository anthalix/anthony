<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Liste des animaux à adopter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleNavbar() {
            var navbar = document.getElementById("navbarNav");
            navbar.classList.toggle("show");
        }
    </script>


</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="site">O'refuge</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="margin:auto 50px;" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="/users-list">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="/messages">Contacts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" href="show-register">S'enregistrer</a>
                        </li>

                        @auth
                        <!-- L'utilisateur est connecté, on affiche les éléments pour utilisateur connecté -->

                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="/logout">Déconnexion</a>
                        </li>
                        <li class="nav-item_auth ">
                            <div class="nav-link_auth fs-5">Connecté en tant que {{ auth()->user()->email }}</div>
                        </li>


                        @else
                        <!-- L'utilisateur n'est pas connecté, on affiche les éléments pour utilisateur non connecté -->
                        <li class="nav-item">
                            <a class="nav-link  fs-5" aria-current="page" href="login">Se connecter</a>
                        </li>


                        @endauth




                    </ul>
                </div>

            </div>
        </nav>
    </header>
    <h1>Contacts</h1>

    <div class="container">
        @foreach($users as $user)
        <div class="card_contact">
            <p>
                <a href="{{ route('admin.messages.show', $user->id) }}">
                    <strong>{{ $user->username }}</strong>
                </a>
                @if($user->unread_count > 0)
                <span class="badge_new">Nouveau message</span>
                @endif
            </p>
            <p>{{ $user->email }} — tel : {{ $user->tel }}</p>
        </div>
        @endforeach
    </div>

    <style>
        .badge_new {
            background-color: #ff4444;
            color: white;
            font-size: 0.8em;
            padding: 3px 8px;
            border-radius: 10px;
            margin-left: 8px;
            font-weight: bold;
        }
    </style>

</body>

</html>