# Blog Task

## Table of Contents

- [Project Overview](#project-overview)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Setup Instructions](#setup-instructions)
- [Database Schema and Setup](#database-schema-and-setup)
- [Usage Instructions](#usage-instructions)


## Project Overview

This project is a simple blog application that allows users to add, edit, view, and delete blog posts. The application is built using PHP and MySQL, with a clean and responsive user interface.

## Features

- Add new blog posts
- Edit existing blog posts
- View full details of blog posts
- Delete blog posts
- Responsive design

## Technologies Used

- **PHP**
- **MySQL**
- **HTML**
- **CSS**


## Setup Instructions

1. **Clone the Repository**
    ```sh
    git clone https://github.com/NadaMahmoud44/Blog_Task.git
    cd Blog_Task
    ```

2. **Set Up the Database**
    - Create a new MySQL database.
    - Import the `blogdb.sql` file into your database to create the necessary tables.

3. **Configure Database Connection**
    - Update the `db_connection.php` file with your database credentials:
      ```php
      <?php
      $servername = "your_server_name";
      $username = "your_username";
      $password = "your_password";
      $dbname = "your_database_name";

      // Create connection
   
      ```

4. **Start the Server**
    - If you are using XAMPP, place the project folder in the `htdocs` directory.
    - Start the Apache and MySQL modules from the XAMPP control panel.

5. **Access the Application**
    - Open your web browser and navigate to `http://localhost/Blog_Task`.

## Database Schema and Setup

- **Database Name**: blogdb
- **Tables**:
  - `posts`
    - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
    - `title` (VARCHAR)
    - `content` (TEXT)
    - `created_at` (TIMESTAMP)

**SQL Script**: The SQL script to set up the database is included in the `blogdb.sql` file.





