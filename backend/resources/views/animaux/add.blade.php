<!DOCTYPE html>
<html lang="en">

<head>
    <title>Créer un nouvel animal</title>
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
                            <a class="nav-link active fs-5" aria-current="page" href="/animaux">liste animaux</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fs-5" aria-current="page" href="/forms">Formulaires</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  active fs-5" aria-current="page" href="/logout">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4 mb-4 bg-light">
        <h1 class="titre">Créer un nouvel animal</h1>
        <form action="{{ route('animaux.add') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-select">
                <label for="name"><strong>Nom :</strong></label>
                <input type="text" class="form-control" name="name" id="name" value="">
            </div>

            <div class="form-select">
                <label for="specie_id"><strong>Espèce :</strong></label>
                <select id="specie_id" class="form-control" name="specie_id" aria-placeholder="Choisir" autofocus="true">
                    <option value="0">Choisir</option>
                    <option value="1">Chien</option>
                    <option value="2">Chat</option>
                    <option value="3">Autre</option>
                </select><br>
                <input class="form-control" type="text" id="new_specie" name="new_specie" placeholder="Nouvelle espèce" style="display: none;">

            </div>

            <div class="form-select">
                <label for="age"><strong>Âge :</strong></label>
                <input type="number" class="form-control" name="age" id="age" value="">
            </div>

            <div class="form-select">
                <label for="sex"><strong>Sexe :</strong></label>
                <select id="sex" class="form-control" name="sex" placeholder="Choisir" autofocus="true">
                    <option value="0">Choisir</option>

                    <option value="Male">Male</option>
                    <option value="Femelle">Femelle</option>
                </select>
            </div>

            <div class="form-select">
                <label for="size"><strong>Taille :</strong></label>
                <select id="size" class="form-control" name="size" autofocus="true">


                    <option value="0">Choisir</option>

                    <option value="Petit">Petit</option>
                    <option value="Moyen">Moyen</option>
                    <option value="Grand">Grand</option>
                </select>
            </div>

            <div class="form-select">
                <label for="description"><strong>Description :</strong></label>
                <textarea type="text" class="form-control" name="description" id="description"></textarea>
            </div>

            <div class="form-select">
                <label for="status"><strong>Status :</strong></label>
                <select id="status" class="form-control" name="status" autofocus="true">
                    <option value="0">Choisir</option>

                    <option value="Adopté">Adopté</option>
                    <option value="Adoptable">Adoptable</option>
                    <option value="SOS Urgent">SOS Urgent</option>
                </select>
            </div>
            <br>

            <div class="form-check ">
                <label for="ok_cat" class="form-check-label"><strong>OK Chat</strong></label>
                <input type="checkbox" class="form-check-input" name="ok_cat" id="ok_cat" value="1">
            </div>
            <br>

            <div class="form-check ">
                <label for="ok_dog" class="form-check-label"><strong>OK Chien</strong></label>
                <input type="checkbox" class="form-check-input" name="ok_dog" id="ok_dog" value="1">
            </div>
            <br>

            <div class="form-check ">
                <label for="ok_kid" class="form-check-label"><strong>OK Enfant</strong></label>
                <input type="checkbox" class="form-check-input" name="ok_kid" id="ok_kid" value="1">
            </div>
            <br>

            <div class="form-select">
                <label for="name_of_adopter"><strong>Nom de l'adopteur :</strong></label>
                <input type="text" class="form-control" name="name_of_adopter" id="name_of_adopter" value="">
            </div>


            <div class="form-select">


                <label for="pictures"><strong>Photo</strong></label>
                <input type="file" class="form-control" name="pictures" id="pictures" accept="image/jpeg">



                <label for="pictures2"><strong>Photo2</strong></label>
                <input type="file" class="form-control" name="pictures2" id="pictures2" accept="image/jpeg">

                <label for="pictures3"><strong>Photo3</strong></label>
                <input type="file" class="form-control" name="pictures3" id="pictures3" accept="image/jpeg">



            </div>


            <div class="form-select">
                <label for="breed_name"><strong>Race</strong></label>
                <input type="text" class="form-control" name="breed_name" id="breed_name" value="">
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary">Créer</button>
            </div>
        </form>


    </div>
    <script>
        const specieSelect = document.getElementById('specie_id');
        const newSpecieInput = document.getElementById('new_specie');
        const errorMessage = document.createElement('p'); // Créer un élément pour afficher le message d'erreur

        errorMessage.style.color = 'red'; // Style pour le message d'erreur

        specieSelect.addEventListener('change', () => {
            if (specieSelect.value === '3') {
                newSpecieInput.style.display = 'block';
                errorMessage.textContent = "Veuillez renseigner le nom de la nouvelle espèce.";
                newSpecieInput.parentNode.appendChild(errorMessage); // Ajouter le message après le champ d'entrée
            } else {
                newSpecieInput.style.display = 'none';
                if (errorMessage.parentNode) { // Si le message existe déjà, on le supprime
                    errorMessage.parentNode.removeChild(errorMessage);
                }
            }
        });
    </script>

</body1>

</html>