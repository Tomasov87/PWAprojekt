<?php
session_start();

// Funkcija za autentifikaciju korisnika
function authenticate($username, $password) {
    return $username === 'admin' && $password === 'adminpass';
}

// Provjera POST zahtjeva
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ako je autentifikacija uspješna
    if (authenticate($username, $password)) {
        $_SESSION['username'] = $username;

        // Preusmjeravanje na unos.php za sve uspješno prijavljene korisnike
        header('Location: unos.php');
        exit();
    } else {
        $message = "Pogrešno korisničko ime ili lozinka. Molimo vas da se prvo registrirate.";
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Prijava</h1>
    </header>
    <main>
        <section>
            <h2>Prijavite se</h2>
            <form action="index.php" method="post">
                <label for="username">Korisničko ime:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Lozinka:</label>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Prijava">
            </form>
            <?php if (isset($message)) : ?>
                <p><?php echo $message; ?></p>
                <?php if ($message === "Pogrešno korisničko ime ili lozinka. Molimo vas da se prvo registrirate.") : ?>
                    <p>Nemate korisnički račun? <a href="registracija.php">Registrirajte se</a>.</p>
                <?php endif; ?>
            <?php endif; ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Portal za vijesti. Sva prava pridržana.</p>
    </footer>
</body>
</html>
