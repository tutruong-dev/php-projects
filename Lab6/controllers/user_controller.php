<?php
include "../models/User.php"; // Nhúng model User và các hàm cần thiết

// Hàm để đọc người dùng từ file CSV
function loadUsers()
{
    $ds_user = array();
    $users_file = fopen("../files/users.csv", "r");
    
    while ($line = fgetcsv($users_file)) {
        if ($line) {
            $user_id = $line[0];
            $username = $line[1];
            $firstname = $line[2];
            $lastname = $line[3];
            $password_input = $line[4];
            $password_check = $line[5];
            $primary_email = $line[6];
            $user = new User($user_id, $username, $firstname, $lastname, $password_input, $password_check, $primary_email);
            array_push($ds_user, $user);
        }
    }
    fclose($users_file);
    return $ds_user;
}

// Hàm để lưu người dùng vào file CSV
function saveUsers($users)
{
    // Mở file users.csv trong chế độ ghi
    $users_file = fopen("../files/users.csv", "w");

    // Ghi từng người dùng vào file
    foreach ($users as $user) {
        fputcsv($users_file, array(
            $user->user_id,
            $user->username,
            $user->firstname,
            $user->lastname,
            $user->password_input,
            $user->password_check,
            $user->primary_email
        ));
    }
    
    fclose($users_file);
}

// Xử lý yêu cầu cập nhật người dùng
if (isset($_POST['btnUpdateUser'])) {
    $user_id = intval($_POST['user_id']);
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password_input = $_POST['password_input'];
    $password_check = $_POST['password_check'];
    $primary_email = $_POST['primary_email'];

    // Nếu user_id khác 0, cập nhật thông tin người dùng
    if ($user_id != 0) {
        $users = loadUsers(); // Tải danh sách người dùng
        $user_found = false;

        foreach ($users as $user) {
            if ($user->user_id == $user_id) {
                // Cập nhật thông tin người dùng
                $user->username = $username;
                $user->firstname = $firstname;
                $user->lastname = $lastname;
                $user->password_input = $password_input;
                $user->password_check = $password_check;
                $user->primary_email = $primary_email;
                $user_found = true;
                break;
            }
        }

        // Nếu tìm thấy người dùng, lưu lại danh sách đã cập nhật
        if ($user_found) {
            saveUsers($users);
        }
    } else { // Nếu user_id bằng 0, tạo người dùng mới
        $users = loadUsers(); // Tải danh sách người dùng
        $max_id = 0;

        // Tìm ID lớn nhất
        foreach ($users as $user) {
            if ($user->user_id > $max_id) {
                $max_id = $user->user_id;
            }
        }

        // Kiểm tra trùng username
        foreach ($users as $user) {
            if ($user->username === $username) {
                echo "<p>Username đã tồn tại. Vui lòng chọn tên khác.</p>";
                echo '<form action="../users/users.php"><button type="submit">GO BACK</button></form>';
                exit;
            }
        }

        // Tạo người dùng mới
        $new_user = new User($max_id + 1, $username, $firstname, $lastname, $password_input, $password_check, $primary_email);
        $users[] = $new_user; // Thêm người dùng mới vào danh sách
        saveUsers($users); // Lưu danh sách người dùng
    }

    // Chuyển hướng về trang danh sách người dùng
    header('Location: ../users/users.php');
    exit;
}
?>
