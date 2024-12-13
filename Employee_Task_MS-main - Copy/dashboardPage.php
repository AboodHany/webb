<?php include '1startingcode.php';?>
    

    <h1>Welcome to the Dashboard, <?= $username ?>!</h1>

    <!-- Dashboard Content -->
    <section>
        <?php if ($role === 'admin'): ?>
            <p>Total Employees: 
                <?= mysqli_fetch_assoc($conn->query("SELECT COUNT(*) AS total FROM users"))['total']; ?>
            </p>
            <p>Total Tasks: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks"))['total']; ?>
            </p>
            <p>Tasks Pending Delivery: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE due_date > NOW()"))['total']; ?>
            </p>
            <p>Overdue and Incomplete Tasks: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE due_date < NOW() AND status != 'complete'"))['total']; ?>
            </p>
            <!-- <p>Total Notifications: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM notifications"))['total']; ?>
            </p> -->
            <p>Tasks Pending: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE status = 'pending'"))['total']; ?>
            </p>
            <p>Tasks In Progress: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE status = 'in progress'"))['total']; ?>
            </p>
            <p>Completed Tasks: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE status = 'complete'"))['total']; ?>
            </p>
        <?php else: ?>
            <p>Your Total Tasks: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE assigned_to = '$username'"))['total']; ?>
            </p>
            <p>Your Tasks Pending Delivery: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE assigned_to = '$username' AND due_date > NOW()"))['total']; ?>
            </p>
            <p>Your Overdue and Incomplete Tasks: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE assigned_to = '$username' AND due_date < NOW() AND status != 'complete'"))['total']; ?>
            </p>
            <p>Your Pending Tasks: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE assigned_to = '$username' AND status = 'pending'"))['total']; ?>
            </p>
            <p>Your In Progress Tasks: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE assigned_to = '$username' AND status = 'in progress'"))['total']; ?>
            </p>
            <p>Your Completed Tasks: 
                <?= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM tasks WHERE assigned_to = '$username' AND status = 'complete'"))['total']; ?>
            </p>
        <?php endif; ?>
    </section>

    <?php
    // Close the connection
    mysqli_close($conn);
    ?>
</body>
</html>
