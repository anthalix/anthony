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

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <h1 class="site">O'refuge</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse"
                    style="margin:auto 50px;" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="/animaux">Liste animaux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="/forms">Formulaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-5" aria-current="page" href="/logout">Déconnexion</a>
                        </li>
                        <li class="nav-item_auth ">
                            <div class="nav-link_auth fs-5">Connecté en tant que {{ auth()->user()->email }}</div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>Modifier un animal</h1>

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
                    <option value="{{ $animal->taille }}">{{ $animal->taille }}</option>
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
                    <option value="adopté">Adopté</option>
                    <option value="disponible">Disponible</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>
            <br>

            <div class="form-check">
                <label for="ok_cat" class="form-check-label"><strong>OK Chat</strong></label>
                <input type="checkbox" id="ok_cat" class="form-check-input" name="ok_cat" value="1" {{ $animal->cat === 1 ? 'checked' : '' }}>
            </div>
            <br>

            <div class="form-check">
                <label for="ok_dog" class="form-check-label"><strong>OK Chien</strong></label>
                <input type="checkbox" id="ok_dog" class="form-check-input" name="ok_dog" value="1" {{ $animal->dog === 1 ? 'checked' : '' }}>
            </div>
            <br>

            <div class="form-check">
                <label for="ok_kid" class="form-check-label"><strong>OK Enfant</strong></label>
                <input type="checkbox" id="ok_kid" class="form-check-input" name="ok_kid" value="1" {{ $animal->child=== 1 ? 'checked' : '' }}>
            </div>
            <br>


            <div class="form-select">
                <label for="images"><strong>Photos actuelles</strong></label>
                <div class="select-img">



                    <div class="thumbnail">
                        @foreach($animal->images as $img)
                        <div class="thumbnail_animal">
                            <img src=" {{ asset('assets/' . $img->filename) }}" width="100">
                            <div class="thumbnail_updated">
                                <input type="file" name="replace_image[{{ $img->id }}]">

                                <button type="submit" name="delete_image_id" value="{{ $img->id }}">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div id="image-input-container">
                    <button type="button" id="add-image-btn" onclick="showFileInput()">Ajouter une image</button>
                </div>

            </div>


            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>

    <script>
        function showFileInput() {
            const container = document.getElementById('image-input-container');
            container.innerHTML = `
        <input type="file" name="images[]" multiple>
    `;
        }
    </script>

    <style>
        #pictures {
            width: 300px;
            height: 25px;
            margin-bottom: 25px;
            font-size: medium;
            padding-bottom: 20px;
        }

        .thumbnail {
            display: flex;
            flex-direction: row;




        }

        .thumbnail_animal {
            background-color: rgba(39, 66, 82, 0.978);
            box-shadow: 2px 2px 10px 1px white;
            margin-left: 10px;
            width: min-content;
        }

        .thumbnail_updated {
            font-size: 0.8rem;

            display: flex;
            flex-direction: column;
            ;
        }

        #image-input-container {
            margin: auto auto;
        }

        #thumbnail {
            height: min-content;
            margin: auto 25px;

        }

        .select-img {

            display: flex;
            flex-direction: row;
            margin-right: auto;



        }


        img {
            margin: 15px;
        }
    </style>

</body>

</html>