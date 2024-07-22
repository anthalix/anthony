<!DOCTYPE html>
<html lang="en">

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
                <h1 class="navbar-brand fs-1" href="animaux">O'refuge</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="/users-list">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="/forms">Formulaires</a>
                        </li>

                        @auth
                        <!-- L'utilisateur est connecté, on affiche les éléments pour utilisateur connecté -->
                        <li class="nav-item">
                            <div class="nav-link fs-5">Connecté en tant que {{ auth()->user()->email }}</div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="/logout">Déconnexion</a>
                        </li>

                        @else
                        <!-- L'utilisateur n'est pas connecté, on affiche les éléments pour utilisateur non connecté -->
                        <li class="nav-item">
                            <a class="nav-link  fs-5" aria-current="page" href="login">Se connecter</a>
                        </li>

                        @endauth

                        <li class="nav-item">
                            <a class="nav-link fs-5" href="show-register">S'enregistrer</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
    <h1>Liste des animaux à adopter</h1><br>
    <div class="grid col-2 "><a href="{{ route('animaux.add') }}" class="btn btn-success">Ajouter un animal</a></div>
    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Espèce</th>
                <th>Race</th>
                <th>Âge</th>
                <th>Sexe</th>
                <th>Taille</th>
                <th>Description</th>
                <th>Status</th>
                <th>OK Chat</th>
                <th>OK Chien</th>
                <th>OK Enfant</th>
                <th>Nom de l'adopteur</th>
                <th>Photo/Url</th>
                <th>Actions</th>
            </tr>
        </thead>
        <br>
        <tbody>
            @foreach ($animaux as $animal)
            <tr>
                <td><strong>{{ $animal->name }}</strong></td>
                <td>{{ $animal->specie_name }}</td>
                <td>{{ $animal-> breed_name}}</td>
                <td>{{ $animal->age }}</td>
                <td>{{ $animal->sex }}</td>
                <td>{{ $animal->size }}</td>
                <td>
                    <p class="text-truncate" style="max-width: 200px;">{{ $animal->description }}</p>
                </td>
                <td>{{ $animal->status }}</td>
                <td>{{ $animal->ok_cat === 1 ? 'True' : ($animal->ok_cat === 2? 'False' : 'inconnu') }}</td>
                <td>{{ $animal->ok_dog === 1 ? 'True' : ($animal->ok_dog === 2 ? 'False' : 'inconnu')}}</td>
                <td>{{ $animal->ok_kid === 1 ? 'True' : ($animal->ok_kid === 2 ? 'False' : 'inconnu')}}</td>
                <td>{{ $animal->name_of_adopter }}</td>
                <td>
                {{ str_replace('public/', '', $animal->pictures) }}<br>
                <!-- Afficher l'image -->
                <img src="{{ asset($animal->pictures) }}" alt="Photo de {{ $animal->name }}" style="max-width: 100px; margin-top: 5px;">
            
            </td>
                </td>
                <td>
                    <a href="{{ route('animaux.edit', ['id' => $animal->id]) }}" class="btn btn-primary mb-1">Modifier</a>

                    <form action="{{ route('animaux.delete', ['id' => $animal->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-grid col-11 d-md-flex justify-content-md-start fixed-bottom ">
        <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn btn-warning d-flex justify-content-end" style="color:white;">Top</button>
    </div>



    <script>
        // Afficher ou masquer le bouton de défilement vers le haut en fonction de la position de défilement
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            var mybutton = document.getElementById("myBtn");
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
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
