<?php
    // Start the session
    session_start();

    // Database connection setup
    $servername = "localhost";
    $username = "root";
    $dbpassword = "";
    $dbname = "website_project";

    // Create connection
    $conn = mysqli_connect($servername, $username, $dbpassword, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve session variables
    $id = $_SESSION['id'];
    $full_name = $_SESSION['full_name'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $role = $_SESSION['role'];
    $email = $_SESSION['email'];
    $phone_number = $_SESSION['phone_number'];
    $profile_picture = $_SESSION['profile_picture'];
    $address = $_SESSION['address'];
    $created_at = $_SESSION['hire_date'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <!-- Navigation Bar -->
    <?php if ($role === 'admin'): ?>
    <nav>
        <ul>
            <li><a href='DashboardPage.php'>Dashboard</a></li>
            <li><a href='tasksPage.php'>Tasks</a></li>   
            <li><a href='createTasksPage.php'>Create Task</a></li>   
            <li><a href='editTasksPage.php'>Edit Task</a></li>
            <li><a href='UsersPage.php'>Users</a></li>   
            <li><a href='createUser.php'>Create User</a></li>   
            <li><a href='editUser.php'>Edit Task</a></li>   
            <li><a href='profilePage.php'>Profile</a></li>
            <li><a href='aboutUsPage.php'>About Us</a></li>

        </ul>
    </nav>
    <?php else: ?>
    <nav>
        <ul>
            <li><a href='DashboardPage.php'>Dashboard</a></li>
            <li><a href='tasksPage.php'>Tasks</a></li>   
            <li><a href='UsersPage.php'>Users</a></li>   
            <li><a href='profilePage.php'>Profile</a></li>
            <li><a href='aboutUsPage.php'>About Us</a></li>
        </ul>
    </nav>
    <?php endif; ?>