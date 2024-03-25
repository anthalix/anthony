<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    </head>
    <body>

    <h1>  O'REFUGE Connexion</h1>

<form action="{{ route('Send-login') }}" method="POST" class="mt-5">
@csrf



    <div class="mb-3">
        <label for="email" :value="__('Email')" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Veuillez saisir votre adresse mail" :value="old('email')" required autofocus autocomplete="username">
    </div><br>
    <div class="mb-3">
        <label for="password" :value="__('Password')"  class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Veuillez saisir votre mot de passe" value="" autocomplete="current-password">
    </div><br>
    <div class="mb-3">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
            </label>
        </div><br>

        <div class="mb-3">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif

        </div>


    <div class="d-grid gap-2">

<button type="submit" class="btn btn-primary mt-5 ">{{ __('Se connecter') }} </button>
</div>
        </div>



</form>
<body>

</html>

