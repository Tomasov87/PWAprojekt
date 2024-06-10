<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vijesti_portal";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Povezivanje na bazu podataka nije uspjelo: " . $conn->connect_error);
}
?>
