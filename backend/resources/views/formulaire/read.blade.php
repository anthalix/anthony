<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form's Read</title>
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
                            <a class="nav-link  fs-5" aria-current="page" href="/users-list">Utilisateurs</a>
                        </li <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="/forms">Formulaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  fs-5" aria-current="page" href="/logout">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1 class="p-2 g-col-6"><strong>Formulaire de {{ $form->firstname }} </strong></h1>

        <div class="form-group">
            <p class="text"><strong>Nom de famille :</strong></p>
            <p class="content">{{ $form->lastname}}</p>
        </div>
        <div class="form-group">
            <p class="text"><strong>Prénom :</strong></p>
            <p class="content">{{ $form->firstname}}</p>
        </div>
        <div class="form-group">
            <p class="text"><strong>Email :</strong></p><br>
            <p class="content">{{ $form->email}}</p>
        </div>
        <div class="form-group">
            <p class="text"><strong>Adresse :</strong></p><br>
            <p class="content">{{ $form->adress}}</p>
        </div>
        <div class="form-group">
            <p class="text"><strong>Code Postale:</strong></p><br>
            <p class="content">{{ $form->zip_code}}</p>
        </div>
        <div class="form-group">
            <p class="text"><strong>Ville :</strong></p><br>
            <p class="content">{{ $form->city}}</p>
        </div>
        <div class="form-group">
            <p class="text"><strong>Message :</strong></p><br>
            <p class="message">{{ $form->message}}</p>
        </div>
    </div>
</body1>

</html>
