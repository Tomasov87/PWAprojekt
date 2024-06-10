<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vijesti_portal";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Povezivanje na bazu podataka nije uspjelo: " . $conn->connect_error);
}

$sql = "SELECT * FROM korisnik WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $_POST['username'], $_POST['password']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {

    header("Location: unos.php");
    exit();
} else {
    echo "<p>Korisničko ime ili lozinka nisu ispravni.</p>";
}
$stmt->close();
$conn->close();
?>
