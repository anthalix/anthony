<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modifier un animal</title>
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
                            <a class="nav-link active fs-5" aria-current="page" href="/animaux">Liste animaux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fs-5" aria-current="page" href="/forms">Formulaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fs-5" aria-current="page" href="/logout">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4 mb-4 bg-light">
        <h3 class="titre">Modifier un animal</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('animaux.update', ['id' => $animal->id]) }} " enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-select">

                <h2>{{ $animal->name }}</h2>
            </div>
            <br>



            <div class="form-select">
                <label for="age"><strong>Âge :</strong></label>
                <input type="number" class="form-control" name="age" id="age" value="{{ $animal->age }}">
            </div>
            <br>



            <div class="form-select">
                <label for="size"><strong>Taille :</strong></label>
                <select type="text" id="size" class="form-control" name="size" autofocus="true">
                    <option value="{{ $animal->size }}">{{ $animal->size }}</option>
                    <option value="Petit">Petit</option>
                    <option value="Moyen">Moyen</option>
                    <option value="Grand">Grand</option>
                </select>
            </div>
            <br>

            <div class="form-select">
                <label for="description"><strong>Description :</strong></label>
                <textarea type="text" id="description" class="form-control" name="description">{{ $animal->description }}</textarea>
            </div>
            <br>

            <div class="form-select">
                <label for="status"><strong>Status :</strong></label>
                <select type="text" id="status" class="form-control" name="status" autofocus="true">
                    <option value="{{ $animal->status }}">{{ $animal->status }}</option>
                    <option value="Adopté">Adopté</option>
                    <option value="Adoptable">Adoptable</option>
                    <option value="SOS Urgent">SOS Urgent</option>
                </select>
            </div>
            <br>

            <div class="form-check">
                <label for="ok_cat" class="form-check-label"><strong>OK Chat</strong></label>
                <input type="checkbox" id="ok_cat" class="form-check-input" name="ok_cat" value="1" {{ $animal->ok_cat === 1 ? 'checked' : '' }}>
            </div>
            <br>

            <div class="form-check">
                <label for="ok_dog" class="form-check-label"><strong>OK Chien</strong></label>
                <input type="checkbox" id="ok_dog" class="form-check-input" name="ok_dog" value="1" {{ $animal->ok_dog === 1 ? 'checked' : '' }}>
            </div>
            <br>

            <div class="form-check">
                <label for="ok_kid" class="form-check-label"><strong>OK Enfant</strong></label>
                <input type="checkbox" id="ok_kid" class="form-check-input" name="ok_kid" value="1" {{ $animal->ok_kid === 1 ? 'checked' : '' }}>
            </div>
            <br>

            <div class="form-select">
                <label for="name_of_adopter"><strong>Nom de l'adopteur :</strong></label>
                <input type="text" id="name_of_adopter" class="form-control" name="name_of_adopter" value="{{ $animal->name_of_adopter }}">
            </div>
            <br>

            <div class="form-select">

                <label for="pictures"><strong>Photos actuelles</strong></label>


                <div class="select-img">



                    <div>
                        <img src="{{ asset($animal->pictures) }}" alt="Photo de {{ $animal->name }}" style="max-width: 200px; max-height: 200px;">
                        
                        
                        <input type="file" id="pictures" class="form-control" name="pictures" value=accept="image/jpeg" placeholder="photo1">
                    </div>

                    <div>

                        <img src="{{ asset($animal->pictures2) }}" alt="Photo de {{ $animal->name }}" style="max-width: 200px; max-height: 200px;">
                        
                        <input type="file" id="pictures" class="form-control" name="pictures2" value=accept="image/jpeg" placeholder="photo2">
                    </div>

                    <div>
                        <img src="{{ asset($animal->pictures3) }}" alt="Photo de {{ $animal->name }}" style="max-width: 200px; max-height: 200px;">
                

                        <input type="file" id="pictures" class="form-control" name="pictures3" value=accept="image/jpeg" placeholder="photo3">

                    </div>

                </div>

            </div>


            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>

    <style>
        #pictures {
            width: 300px;
            height: 25px;
            margin-bottom: 25px;
            font-size: medium;
            padding-bottom: 20px;
        }

        .select-img {

            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin: auto;
        }


        img{margin : 15px;}

    </style>

    </body>

</html>