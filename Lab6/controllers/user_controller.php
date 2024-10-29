<?php
include "../models/User.php"; // Nhúng model User và các hàm cần thiết
include "../includes/opening.php"; // Kết nối đến cơ sở dữ liệu
include_once "../includes/functions.php";
// Hàm để đọc người dùng từ database MySQL
function loadUsers() {
    global $conn; // Sử dụng biến kết nối toàn cục
    $ds_user = array();
    
    $query = "SELECT * FROM users"; // Giả định tên bảng là 'users'
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User(
                $row["id"],
                $row["username"],
                $row["firstname"],
                $row["lastname"],
                $row["password_input"],
                $row["password_check"],
                $row["email"]
            );
            array_push($ds_user, $user);
        }
    }
    return $ds_user;
}

// Hàm để lưu hoặc cập nhật người dùng trong database MySQL
function saveUser($user) {
    global $conn;
    if ($user->user_id) { // Cập nhật người dùng nếu user_id đã tồn tại
        $query = "UPDATE users SET 
                    username = ?, 
                    firstname = ?, 
                    lastname = ?, 
                    password_input = ?, 
                    password_check = ?, 
                    email = ?
                  WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssssi", $user->username, $user->firstname, $user->lastname, $user->password_input, $user->password_check, $user->primary_email, $user->user_id);
        $stmt->execute();
    } else { // Thêm người dùng mới
        $query = "INSERT INTO users (username, firstname, lastname, password_input, password_check, email) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $user->username, $user->firstname, $user->lastname, $user->password_input, $user->password_check, $user->primary_email);
        $stmt->execute();
    }
}

// Xử lý yêu cầu cập nhật hoặc thêm người dùng
if (isset($_POST['btnUpdateUser'])) {
    $user_id = intval($_POST['user_id']);
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password_input = $_POST['password_input'];
    $password_check = $_POST['password_check'];
    $primary_email = $_POST['primary_email'];

    // Kiểm tra xem password_input và password_check có khớp không
    if ($password_input !== $password_check) {
        echo "<p>Mật khẩu không khớp. Vui lòng nhập lại.</p>";
        echo '<form action="../users/users.php"><button type="submit">Quay lại</button></form>';
        exit;
    }

    $user = new User($user_id, $username, $firstname, $lastname, $password_input, $password_check, $primary_email);

    // Kiểm tra trùng tên người dùng nếu đang thêm mới
    if ($user_id === 0) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<p>Username đã tồn tại. Vui lòng chọn tên khác.</p>";
            echo '<form action="../users/users.php"><button type="submit">Quay lại</button></form>';
            exit;
        }
    }

    // Lưu hoặc cập nhật người dùng
    saveUser($user);

    // Chuyển hướng về trang danh sách người dùng
    header('Location: ../users/users.php');
    exit;
}
?>
