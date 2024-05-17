<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Post</title>
    <link rel="stylesheet" href="../public/styles.css">
</head>

<body>
    <div class="container">
        <?php
        include '../db_connection.php'; 

        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            
            $sql = "SELECT * FROM posts WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $post = $result->fetch_assoc();
                echo "<div class='post'>";
                echo "<h2>" . $post['title'] . "</h2>";
                echo "<p>" . $post['content'] . "</p>";
                echo "</div>";
            } else {
                echo "<p>Error: Post not found.</p>";
            }
        } else {
            echo "<p>Error: Post ID not specified.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>
