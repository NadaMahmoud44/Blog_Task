<?php
include '../db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];

            if ($_POST['action'] == 'create') {
                // SQL to insert data into the database
                $sql = "INSERT INTO posts (title, content) VALUES ('$title', '$content')";
            } elseif ($_POST['action'] == 'update') {
                $id = $_POST['id'];
                // SQL to update data in the database
                $sql = "UPDATE posts SET title='$title', content='$content' WHERE id=$id";
            }

            if ($conn->query($sql) === TRUE) {
                echo "<p class='success'>Post {$_POST['action']}d successfully.</p>";
            } else {
                echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }
        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Post</title>
    <link rel="stylesheet" href="../public/styles.css">
</head>
<body>
    <div class="container">
        <h1>Add New Post</h1>
        <form action="../index.php" method="post"> 
            
            <input type="hidden" name="action" value="create">
            
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" style="width: 100%; padding: 10px; margin-bottom: 20px;">
         
            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="8" style="width: 100%; padding: 10px; margin-bottom: 20px;"></textarea>
            
            <button type="submit" class="add-post-btn">Add Post</button>
        </form>
    </div>
</body>
</html>

