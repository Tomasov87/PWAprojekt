<?php
require 'config.php'; // Uključivanje konfiguracijske datoteke

// Funkcija za dohvaćanje najnovijih vijesti za određenu kategoriju
function getLatestNews($category, $conn)
{
    $sql = "SELECT * FROM vijesti WHERE category = ? ORDER BY created_at DESC LIMIT 3";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Dohvaćanje najnovijih vijesti za kategoriju sport
$sport_news = getLatestNews('sport', $conn);

// Dohvaćanje najnovijih vijesti za kategoriju tehnologija
$tehnologija_news = getLatestNews('tehnologija', $conn);

$conn->close();
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal za vijesti</title>
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

        main {
            padding: 20px;
        }

        .news-category {
            margin-bottom: 20px;
        }

        .news-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .news-item {
            flex: 1 1 calc(33.333% - 20px); /* Jednake širine s razmakom */
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

        .news-item h3 {
            font-size: 1.2rem;
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
        <h1>Portal za vijesti</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Početna</a></li>
            <li><a href="sport.php">Sport</a></li>
            <li><a href="tehnologija.php">Tehnologija</a></li>
            <li><a href="unos.php">Unos vijesti</a></li>
            <li><a href="administrator.php">Administracija</a></li>
            <li><a href="registracija.php">Login</a></li>
            <li><a href="vijest.php">Vijest</a></li>
        </ul>
    </nav>
    <main>
        <section class="news-category">
            <h2>Sport</h2>
            <div class="news-row">
                <?php foreach ($sport_news as $news) : ?>
                    <article class="news-item">
                        <img src="<?php echo $news['image_path']; ?>" alt="<?php echo $news['title']; ?>">
                        <h3><?php echo $news['title']; ?></h3>
                        <p><?php echo $news['description']; ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="news-category">
            <h2>Tehnologija</h2>
            <div class="news-row">
                <?php foreach ($tehnologija_news as $news) : ?>
                    <article class="news-item">
                        <img src="<?php echo $news['image_path']; ?>" alt="<?php echo $news['title']; ?>">
                        <h3><?php echo $news['title']; ?></h3>
                        <p><?php echo $news['description']; ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Portal za vijesti. Sva prava pridržana.</p>
    </footer>
</body>

</html>
