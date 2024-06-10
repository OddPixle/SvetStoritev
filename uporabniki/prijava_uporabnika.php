<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/prijava.css">
    <title>LogIn</title>
</head>
<body>
    <div class="login-form">
        <h1>Log in</h1>
        <form action="prijava.php" method="POST">
            <input type="email" class="form-control" name="email" placeholder="E-mail" required><br>
            <input type="password" class="form-control" name="geslo" placeholder="Geslo" required><br>
            <input type="submit" class="btn" name="sub" value="Prijava">
        </form>
        <p class="link">Nimate še računa, <a href="registracija_uporabnika.php">Registrirajte se</a></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
