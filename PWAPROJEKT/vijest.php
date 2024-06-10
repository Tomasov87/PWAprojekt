<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalji vijesti</title>
    <link rel="stylesheet" href="style.css">
    <style>
        article {
            text-align: center;
            margin: 0 auto;
            max-width: 800px;
        }

        article img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
        }

        article h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        article p {
            font-size: 1.2em;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <header>
        <h1>Detalji vijesti</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Početna</a></li>
            <li><a href="sport.php">Sport</a></li>
            <li><a href="tehnologija.php">Tehnologija</a></li>
            <li><a href="unos.html">Unos vijesti</a></li>
            <li><a href="administrator.php">Administracija</a></li>
        </ul>
    </nav>
    <main>
        <?php
        require 'config.php';
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $stmt = $conn->prepare("SELECT * FROM vijesti WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<article>";
                echo "<h2>" . $row['title'] . "</h2>";
                if (!empty($row['image_path'])) {
                    echo "<img src='" . $row['image_path'] . "' alt='" . $row['title'] . "'>";
                }
                echo "<p>" . $row['description'] . "</p>";
                echo "</article>";
            } else {
                echo "<p>Vijest nije pronađena.</p>";
            }
            $stmt->close();
        } else {
            echo "<p>ID vijesti nije postavljen.</p>";
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Portal za vijesti. Sva prava pridržana.</p>
    </footer>
</body>

</html>
