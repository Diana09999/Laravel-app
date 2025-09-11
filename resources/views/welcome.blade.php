<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<body>
<h1>Manger pour les nuls</h1>

<button onclick="location.href='login'">Créer</button>
@foreach($plats as $plat)
    {{$plat->titre}}
@endforeach

<input type="text" name="name" value="{{old('name')}}">

<button onclick="location.href='welcome'>Précedent</button>
<button onclick="location.href='welcome'>Suivant</button>

</body>
</html>
