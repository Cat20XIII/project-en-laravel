<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Ceci est un titre</h1>
    <a href=""></a>
    <a href=""></a>
    <p>Mon prénom est : {{ $prenom }}</p>

    {{ dump($produits)  }}

    {{-- Ceci est un commentaire en blade --}}

    @foreach ($produits as $prod)
        <ul>
            <li>Titre : {{ $prod['title'] }}</li>
            <li>Description : {{ $prod['description'] }}</li>
            <li>Prix : {{ $prod['prix'] }}</li>
        </ul>
    @endforeach

</body>
</html>