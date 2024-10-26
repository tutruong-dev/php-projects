<?php
require_once 'functions.php';

if (isset($_GET['id'])) {
    $userID = $_GET['id'];
    $users = loadUsers();

    foreach ($users as $user) {
        if ($user->getUserID() == $userID) {
            echo "User ID: " . $user->getUserID() . "<br>";
            echo "Username: " . $user->getUserName() . "<br>";
            echo "Full Name: " . $user->fullName() . "<br>";
            echo "Primary Email: " . $user->getPrimaryEmail() . "<br>";
            break;
        }
    }
} else {
    echo "User not found.";
}
?>
