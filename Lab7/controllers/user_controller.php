<?php
include '../includes/opening.php';
include_once "../includes/functions.php";

if (isset($_POST['btnUpdateUser'])) {
    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password_input = $_POST['password_input'];
    $password_check = $_POST['password_check'];
    $email = $_POST['primary_email'];
    $username = $_POST['username']; // Lấy giá trị từ form

    // Kiểm tra email trùng lặp
    if ($user_id != 0) {
        // Cập nhật user
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
        $stmt->bind_param("si", $email, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Email đã tồn tại, vui lòng sử dụng email khác.";
        } else {
            // Thực hiện cập nhật
            $stmt = $conn->prepare("UPDATE users SET firstname=?, lastname=?, password_input=?, password_check=?, email=?, username=? WHERE id=?");
            $stmt->bind_param("ssssssi", $firstname, $lastname, $password_input, $password_check, $email, $username, $user_id);
            $stmt->execute();
            $stmt->close();
            echo "Cập nhật thành công.";
        }
    } else {
        // Tạo user mới
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Email đã tồn tại, vui lòng sử dụng email khác.";
        } else {
            // Nếu không trùng lặp, tiến hành tạo người dùng mới
            $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, password_input, password_check, email, username) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $firstname, $lastname, $password_input, $password_check, $email, $username);
            $stmt->execute();
            $stmt->close();
            echo "Tạo người dùng thành công.";
        }
    }
}
?>
