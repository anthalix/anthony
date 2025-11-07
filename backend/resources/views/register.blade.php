<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>


    <h1 class="site"> Enregistrement</h1>

    <form method="POST" action="{{ route('register') }}" class="mt-5">
        @csrf


        <div class='mb-3'>
            <label for="username" :value="__('userame')" class="form-label">Nom </label>
            <input id="username" class="form-control" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
        </div><br>

        <div class="mb-3">
            <label for="email" :value="__('Email')" class="form-label">Email</label>
            <input id="email" class="form-control" type="email"
                placeholder="Veuillez saisir une adresse mail" name="email" :value="old('email')" required autocomplete="email" />

        </div><br>

        <div class="mb-3">
            <label for="password" :value="__('Password')" class="form-label">Mot de passe</label>

            <input id="password" class="form-control"
                placeholder="Veuillez saisir un mot de passe"
                type="password"
                name="password"
                required autocomplete="new-password" />

        </div><br>

        <div class="mb-3">
            <label for="password_confirmation" :value="__('Confirm Password')" class="form-label">Confirmer mot de passe</label>

            <input id="password_confirmation" class="form-control"
                placeholder="Veuillez confirmer votre mot de passe"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

        </div><br>

        <div class="flex items-center justify-center mt-4">


            <button type="submit" class="btn btn-primary  ">
                {{ __("S'enregistrer") }}
            </button>
        </div>
    </form>
</body>

</html>
<style>
    .form-control {
        width: 80%;
        font-size: 1rem;
    }
</style>