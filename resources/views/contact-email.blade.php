<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<ul>
    <li>
        <i class="fa fa-user">Nom:{{$data['userName']}}</i>
    </li>
    <li>
        <i class="fa fa-mobile"> Tél:{{$data['userPhone']}}</i>
    </li>
    <li>
        <i class="fa fa-envelope">Mail:{{$data['userEmail']}}</i>
    </li>
    <li>
        <i class="fa fa-pencil"> Message:{{$data['userMsg']}}</i>
    </li>
</ul>
</body>
</html>