<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../public/styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit Post</h1>
        <?php
        // Include the database connection file
        include '../db_connection.php';

        // Check if the post ID is set
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Fetch the post data from the database
            $sql = "SELECT * FROM posts WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $post = $result->fetch_assoc();
        ?>
       <form action="../index.php" method="post"> 
        <input type="hidden" name="action" value="update"> 
        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" style="width: 100%; padding: 10px; margin-bottom: 20px;" value="<?php echo $post['title']; ?>" required><br>
        <label for="content">Content:</label><br>
        <textarea id="content" name="content" rows="8" style="width: 100%; padding: 10px; margin-bottom: 20px;" required><?php echo $post['content']; ?></textarea><br>
        <button type="submit" class="add-post-btn">Save Changes</button>
    </form>
    
        <?php
            } else {
                echo "<p style='color:red;'>Error: Post not found.</p>";
            }
        } else {
            echo "<p >Error: Post ID not specified.</p>";
        }

        
        $conn->close();
        ?>
    </div>
</body>
</html>
