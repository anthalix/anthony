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


<h1>  O'REFUGE Enregistrement</h1>

    <form method="POST" action="{{ route('register') }}"class="mt-5">
        @csrf


        <div class ='mb-3'>
            <label for="name" :value="__('Name')" class="form-label">Nom </label>
            <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div><br>

        <div class="mb-3">
            <label for="email" :value="__('Email')" class="form-label">Email</label>
            <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />

        </div><br>

        <div class="mb-3">
            <label for="password" :value="__('Password')" class="form-label">Mot de passe</label>

            <input id="password" class="form-control"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

        </div><br>

        <div class="mb-3">
            <label for="password_confirmation" :value="__('Confirm Password')"class="form-label">Confirmer mot de passe</label>

            <input id="password_confirmation" class="form-control"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

        </div><br>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Prêt à vous enregistrer?') }}
            </a>

            <button type="submit" class="btn btn-primary mt-5 ">
                {{ __("S'enregistrer") }}
            </button>
        </div>
    </form>
    </body>
</html>

