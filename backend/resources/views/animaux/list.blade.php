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

    <h1>Liste des animaux à adopter <div>
            <a href="{{ route('animaux.add') }}" class="btn ">
                Ajouter un animal
            </a>
        </div>
    </h1>



    <div class="container ">


        @foreach ($animaux as $animal)


        <div class="card">

            <strong>{{ $animal->name }}</strong>

            <img src="{{ $animal->first_image_url }}" alt="Photo de {{ $animal->name }}">
            <div class="infos-animal">
                <p> {{ $animal->specie_name }} : {{ $animal-> breed_name}}</p>
                <p> {{ $animal->sex }} de {{ $animal->age }} ans</p>

            </div>
            <div class=actions>
                <p> <a href="{{ route('animaux.edit', ['id' => $animal->id]) }}" class="btn ">Modifier</a>

                <p>
                <form action="{{ route('animaux.delete', ['id' => $animal->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                </p>
            </div>
        </div>
        @endforeach

    </div>
    <div class="d-grid col-11 d-md-flex justify-content-md-start fixed-bottom ">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn btn-primary d-flex " style="font-size :2rem ; padding:  0 15px">top</button>
    </div>



    <script>
        // Afficher ou masquer le bouton de défilement vers le haut en fonction de la position de défilement
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            var mybutton = document.getElementById("myBtn");
            if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // Défiler vers le haut lorsque le bouton est cliqué
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>

</html>