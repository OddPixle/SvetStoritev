<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LogIn.css">
    <title>LogIn</title>
</head>
<body>
    <h1>Log in</h1>
    <form action="prijava.php" method="POST">
        <input type="email" name="email" placeholder="E-mail" required><br>
        <input type="password" name="geslo" placeholder="Geslo" required><br>
        <input type="submit" name="sub"value="Prijava">
    </form>
    <p class="link">Nimate še računa, <a href="registracija_uporabnika.php">Registrirajte se</a></p>
</body>
</html>