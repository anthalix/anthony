<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form's List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function toggleNavbar() {
        var navbar = document.getElementById("navbarNav");
        navbar.classList.toggle("show");
    }
</script>



</head>
<body1>
    <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <h1 class="navbar-brand fs-1">O'refuge</h1>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                    <li class="nav-item">
                            <a class="nav-link  fs-5" aria-current="page" href="/animaux">Liste animaux</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link  fs-5" aria-current="page" href="users-list">Utilisateurs</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5"aria-current="page" href="/logout">Déconnexion</a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>
    </header>
        <h1>Liste des contact :</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>nom</th>
                    <th>prénom</th>
                    <th>email</th>
                    <th>adresse</th>
                    <th>code postale</th>
                    <th>ville</th>
                    <th>message</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($forms as $form)
                    <tr>
                        <td><strong>{{ $form->lastname }}</strong></td>
                        <td>{{ $form->firstname }}</td>
                        <td>{{ $form->email }}</td>
                        <td>{{ $form->adress }}</td>
                        <td>{{ $form->zip_code }}</td>
                        <td>{{ $form->city }}</td>
                        <td><p class="text-truncate" style="max-width: 200px;">{{ $form->message }}</p></td>
                        <td>
                            <a href="{{ route('form.read', ['id' => $form->id]) }}" class="btn btn-primary mb-1">Consulter</a>
                            <form action="{{ route('form.delete', ['id' => $form->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce formulaire ?');">
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
        window.onscroll = function() {scrollFunction()};

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
</body1>
</html>
