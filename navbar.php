<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <?php
            // Start or resume the session
            session_start();

            if (isset($_SESSION["username"])) {
                if ($_SESSION["usertype"] === "teamleader") {
                    echo '<a href="teamleader_dashboard.php">Dashboard</a>';
                    echo '<a href="registration.php">Add User</a>';
                    echo '<a href="delete_users.php">Delete User</a>';
                } elseif ($_SESSION["usertype"] === "associate") {
                    echo '<a href="associate_dashboard.php">Dashboard</a>';
                }

                echo '<a href="logout.php" class="logout">Logout</a>';
            }
        ?>
    </nav>
</body>
</html>
