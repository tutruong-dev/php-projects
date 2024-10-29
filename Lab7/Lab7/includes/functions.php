<?php
// Define the base directory
$GLOBALS['BASE'] = dirname(__DIR__);

// Include the User model
include_once $GLOBALS['BASE'] . "/models/User.php";

/**
 * Load users from the database
 *
 * @return User[] Array of User objects
 */
function loadUsers()
{
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $databasename = "users_schema";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $databasename);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch users
    $query = "SELECT * FROM users";

    // Execute query
    $result = $conn->query($query);

    $ds_user = [];

    // Check the result and create User objects
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user = new User(
                $row["id"],
                $row["username"],
                $row["firstname"],
                $row["lastname"],
                $row["password_input"],
                $row["password_check"],
                $row["email"]
            );
            $ds_user[] = $user; // Add User object to array
        }
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    
    return $ds_user; // Return array of User objects
}

/**
 * Display users in a table format
 */
function displayUsers()
{
    $ds_user = loadUsers();
    echo '<h1>Display Users</h1>';
    echo '<table class="table-primary table-bordered">
        <thead>
            <tr>
                <td>Username</td>
                <td>Fullname</td>
            </tr>
        </thead>
        <tbody>';
    foreach ($ds_user as $user) {
        echo '<tr>
            <td>' . htmlspecialchars($user->username) . '</td>
            <td>' . htmlspecialchars($user->fullName()) . '</td>
        </tr>';
    }
    echo '</tbody></table>';
}

/**
 * Display users with links to user info pages
 */
function displayUsersWithLink()
{
    $ds_user = loadUsers();
    echo '<h1>Display Users with Links</h1>';
    echo '<table class="table-primary table-bordered">
        <thead>
            <tr>
                <td>Username</td>
                <td>Fullname</td>
            </tr>
        </thead>
        <tbody>';
    foreach ($ds_user as $user) {
        echo '<tr>
            <td><a href="userinfo.php?id=' . htmlspecialchars($user->user_id) . '">' . htmlspecialchars($user->username) . '</a></td>
            <td>' . htmlspecialchars($user->fullName()) . '</td>
        </tr>';
    }
    echo '</tbody></table>';
}

/**
 * Display users with links to forms for user information
 */
function displayUsersWithLinkToForm()
{
    $ds_user = loadUsers();
    echo '<h1>Display Users with Links to Form</h1>';
    echo '<table class="table-primary table-bordered">
        <thead>
            <tr>
                <td>Username</td>
                <td>Fullname</td>
            </tr>
        </thead>
        <tbody>';
    foreach ($ds_user as $user) {
        echo '<tr>
            <td><a href="formuserinfo.php?id=' . htmlspecialchars($user->user_id) . '">' . htmlspecialchars($user->username) . '</a></td>
            <td>' . htmlspecialchars($user->fullName()) . '</td>
        </tr>';
    }
    echo '</tbody></table>'; echo'<br>';
    echo '<a href="formuserinfo.php?id=0" class="btn btn-primary btn-lg">Create user</a>'; // Link to create a new user
}
