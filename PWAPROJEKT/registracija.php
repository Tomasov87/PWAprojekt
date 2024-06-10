<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Registracija</h1>
    </header>
    <main>
        <section>
            <h2>Registrirajte se</h2>
            <form action="registracija_skripta.php" method="post">
                <label for="username">Korisničko ime:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Lozinka:</label>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Registracija">
            </form>
        </section>
    </main>

</body>
</html>
