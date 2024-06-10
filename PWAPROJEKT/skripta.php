<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $category = htmlspecialchars($_POST['category']);
    $save_to_db = isset($_POST['save_to_db']) ? true : false;
    $image = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image);


    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        if ($save_to_db) {
           
            $stmt = $conn->prepare("INSERT INTO vijesti (title, description, category, image_path) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $title, $description, $category, $target_file);
            
            if ($stmt->execute()) {
                echo "Vijest je uspješno spremljena u bazu.";
                echo '<br><a href="index.php">Početna</a>';
            } else {
                echo "Greška pri spremanju vijesti u bazu.";
            }
            $stmt->close();
        } else {
          
            $category_page = ($category === 'sport') ? 'sport.php' : 'tehnologija.php';

       
            $page_content = file_get_contents($category_page);
            
        
            $news_html = "
            <div class='news-item'>
                <h2>$title</h2>
                <p>$description</p>
                <div class='news-image'><img src='$target_file' alt='$title'></div>
            </div>";

          
            $updated_content = str_replace("<!-- END OF NEWS -->", $news_html . "\n<!-- END OF NEWS -->", $page_content);

            file_put_contents($category_page, $updated_content);

            header("Location: $category_page");
            exit;
        }
    } else {
        echo "Greška pri uploadu slike.";
    }
}
$conn->close();
?>
