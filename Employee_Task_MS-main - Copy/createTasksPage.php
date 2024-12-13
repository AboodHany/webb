<?php include '1startingcode.php';?>

    <!-- Create Task Content -->
    <h1>Create task, <?= $username ?>!</h1>

    <form action="createTasksPage.php" method="post">
        <label>Task title:</label>
        <input type="text" id="title" name="title"><br><br>

        <label>Task description:</label>
        <input type="text" id="description" name="description"><br><br>

        <label>Task will be assigned to:</label>
       
        <?php
        // Query to fetch full_name from the users table
        $query = "SELECT id, full_name FROM users WHERE full_name LIKE 'emp%';";
        $result = mysqli_query($conn, $query);

        if ($result) {
              echo "<br>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<input type='radio' name='users[]' value=" . $row['id'] . "> " . $row['full_name'] . "<br>";
            }
        } else {
            echo "Error";
        }
        ?>
      
        <br><br>

        <label>Task status:</label>
        <select id="status" name="status">
            <option value="pending">Pending</option>
            <option value="in_progress">In progress</option>
            <option value="completed">Completed</option>
        </select>
        <br><br>

        <label>Due Date:</label>
        <input type="date" id="due_date" name="due_date" value="<?php echo date('Y-m-d'); ?>">
        <br><br>

        <input type="submit" name="sub" value="Submit!">
    </form>

    <?php
    if (isset($_POST['sub'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $assigned_to_id = $_POST['users'][0]; // Get the selected user ID
        // Query to get the username for the selected user ID
$user_query = "SELECT username FROM users WHERE id = '$assigned_to_id'";
$user_result = mysqli_query($conn, $user_query);

if ($user_result && mysqli_num_rows($user_result) > 0) {
    $user_row = mysqli_fetch_assoc($user_result);
    $assigned_to = $user_row['username']; // Get the username
} else {
    echo "Error: User not found!";
    exit; // Stop the process if the user is not found
}

        $status = $_POST['status'];
        $due_date = $_POST['due_date'];

        $query = "INSERT INTO tasks (title, description, assigned_to, status, due_date) 
              VALUES ('$title', '$description', '$assigned_to', '$status', '$due_date')";
    
    if (mysqli_query($conn, $query)) {
        echo "Task created successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
        // Insert your logic here to handle the task creation.
        // Example: Saving the task into the database.
    } else {
        echo "Error: Form not submitted properly.";
    }

    // Close the connection
    mysqli_close($conn);
    ?>
</body>
</html>
