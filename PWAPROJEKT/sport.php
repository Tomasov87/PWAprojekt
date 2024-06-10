<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            background-color: #444;
            overflow: hidden;
        }

        nav ul li {
            float: left;
        }

        nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #111;
        }

        .news-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .news-item {
            flex: 1 1 30%;
            box-sizing: border-box;
            margin: 10px;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            text-align: center;
        }

        .news-item img {
            max-width: 100%;
            height: auto;
        }

        .news-item h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .news-item p {
            font-size: 1rem;
            color: #333;
        }

        footer {
            text-align: center;
            padding: 1rem 0;
            background-color: #333;
            color: #fff;
        }
    </style>
</head>

<body>
    <header>
        <h1>Vijesti iz sporta</h1>
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
        <section class="news-container">
   
            <?php
            require 'config.php';
            $sql = "SELECT * FROM vijesti WHERE category='sport' ORDER BY created_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='news-item'>";
                    echo "<h2><a href='vijest.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h2>";
                    echo "<p>" . $row['description'] . "</p>";
                    if (!empty($row['image_path'])) {
                        echo "<div class='news-image'><img src='" . $row['image_path'] . "' alt='" . $row['title'] . "'></div>";
                    }
                    echo "</div>";
                }
            } else {
                echo "<p>Nema vijesti za prikazati.</p>";
            }
            ?>
    
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Portal za vijesti. Sva prava pridržana.</p>
    </footer>
</body>

</html>
