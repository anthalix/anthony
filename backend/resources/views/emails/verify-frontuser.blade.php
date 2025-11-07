<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <h2>Bonjour {{ $frontUser->username }},</h2>
    <p>Merci de vous être inscrit sur O'refuge !</p>
    <p>Cliquez sur le lien ci-dessous pour vérifier votre compte :</p>
    <p>
        <a href="{{ $verificationUrl }}" style="background-color:#4CAF50;color:white;padding:10px 15px;text-decoration:none;border-radius:5px;">
            Vérifier mon compte
        </a>
    </p>
</body>

</html>