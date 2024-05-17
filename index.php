<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="public/styles.css">
</head>

<body>
    <div class="container">
        <h1>My Blog</h1>

        <?php
        include 'db_connection.php';

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
                echo "<p style='color: green; font-size: 18px; padding: 10px; background-color: #f0f8ff; border-radius: 5px;'>Post {$_POST['action']}d successfully.</p>";
            } else {
                echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }
        }

        // Handle delete action
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM posts WHERE id=$id";

            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green; font-weight: bold;'>";
            } else {
                echo "<p class='error'>Error deleting post: " . $conn->error . "</p>";
            }
        }


        // Display posts
        $sql = "SELECT * FROM posts";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h2>" . $row['title'] . "</h2>";
                echo "<p>" . substr($row['content'], 0, 220) . "...</p>"; // Display a portion of the content
                echo "<div class='post-actions'>";
                echo "<a href='views/full_post.blade.php?id=" . $row['id'] . "' style='margin-right: 10px;'>Read More</a>"; // Link to full post page
                echo "<div>";
                echo "<a href='views/edit_post.blade.php?id=" . $row['id'] . "' style='margin-right: 10px;'>Edit</a>";
                echo "<a href='index.php?action=delete&id=" . $row['id'] . "' style='margin-right: 10px;' onclick='return confirm(\"Are you sure you want to delete this post?\");'>Delete</a>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p style='color:black;'>No posts found.</p>";
        }

        $conn->close();
        ?>

        <a href="views/add_post.blade.php" class="add-post-btn">Add New Post</a>
    </div>
</body>

</html>