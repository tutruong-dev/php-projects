<?php
include "../controllers/user_controller.php"; // Đảm bảo rằng đường dẫn chính xác đến user_controller.php

// Kiểm tra xem id có tồn tại không
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

// Nếu id = 0, hiển thị form trống để tạo user mới
if ($id == 0) {
    $user = new stdClass();
    $user->user_id = 0;
    $user->username = '';
    $user->firstname = '';
    $user->lastname = '';
    $user->password_input = '';
    $user->password_check = '';
    $user->primary_email = '';
} else {
    // Tìm user dựa trên id nếu id khác 0
    $ds_user = loadUsers();
    foreach ($ds_user as $u) {
        if ($u->user_id == $id) {
            $user = $u;
            break;
        }
    }

    // Nếu không tìm thấy user, hiển thị thông báo
    if (!isset($user)) {
        echo "<p>User không tồn tại.</p>";
        echo '<form action="users.php"><button type="submit">GO BACK</button></form>';
        exit;
    }
}
?>

<!-- Hiển thị form với dữ liệu của user hoặc form trống nếu tạo mới -->
<h1><?php echo $id == 0 ? "Create New User" : "User Information"; ?></h1>

<form action="../controllers/user_controller.php" method="POST">
    <div class="form-group row">
        <label for="user_id">User ID:</label>
        <span id="user_id"><?php echo htmlspecialchars($user->user_id); ?></span>
    </div>

    <div class="form-group col">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user->username); ?>" required>
    </div>

    <div class="form-group col">
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" value="<?php echo htmlspecialchars($user->firstname); ?>" required>
    </div>

    <div class="form-group col">
        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($user->lastname); ?>" required>
    </div>

    <div class="form-group col">
        <label for="password_input">Password:</label>
        <input type="password" id="password_input" name="password_input" value="" required>
    </div>

    <div class="form-group col">
        <label for="password_check">Confirm Password:</label>
        <input type="password" id="password_check" name="password_check" value="" required>
    </div>

    <div class="form-group col">
        <label for="primary_email">Primary Email:</label>
        <input type="email" id="primary_email" name="primary_email" value="<?php echo htmlspecialchars($user->primary_email); ?>" required>
    </div>

    <!-- Hidden field để gửi user_id -->
    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user->user_id); ?>">

    <!-- Nút submit để cập nhật hoặc tạo user -->
    <button type="submit" name="btnUpdateUser" value="<?php echo $id == 0 ? "Create user" : "Update user"; ?>">
        <?php echo $id == 0 ? "Create User" : "Update User"; ?>
    </button>
</form>
