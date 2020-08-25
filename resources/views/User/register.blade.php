<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">

    <title>Inscription</title>
</head>
<body>

    <form method="POST">
        @csrf
        <input type="text" name="nom" placeholder="Nom" class="form-control"><br />
        <input type="text" name="prenom" placeholder="Prénom" class="form-control"><br />
        <input type="email" name="email" placeholder="Adresse Email" class="form-control"><br />
        <input type="password" name="password" placeholder="Mot de passe" class="form-control"><br />
        <input type="date" name="date_naissance" class="form-control"><br />
        <select name="genre" class="form-control">
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Autre">Autre</option>
        </select><br />
        <input type="submit" class="btn btn-primary">
        @if(isset($errors->nom))
            <p style="color: red">{{ $errors }}</p>
        @endif
        @if(isset($error_email))
            <p style="color: red">{{ $error_email }}</p>
        @endif
    </form>

</body>
</html>
