<!DOCTYPE html>
<html>
<head>
    <title>Reset de Senha</title>
</head>
<body>
    <h1>Olá {{ $user->name }}</h1>
    <p>Clique no link abaixo para resetar sua senha:</p>
    <p><a href="{{ url('reset/'.$token) }}">Resetar Senha</a></p>
</body>
</html>
