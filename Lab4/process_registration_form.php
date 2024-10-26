<?php
// Hàm kiểm tra username
function check_username($username) {
    // Kiểm tra nếu có ký tự trắng
    if (preg_match('/\s/', $username)) {
        return false;
    }
    return true;
}

// Hàm kiểm tra password
function check_password($password) {
    // Kiểm tra độ dài
    if (strlen($password) < 6) {
        return false;
    }
    // Kiểm tra có ký tự viết hoa
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }
    // Kiểm tra ký tự đặc biệt
    if (!preg_match('/[#@~^*]/', $password)) {
        return false;
    }
    return true;
}

// Hàm mã hóa mật khẩu bằng cách dịch chuyển ký tự ASCII
function ascii_encrypt_password($password, $shift) {
    $encrypted_password = '';
    for ($i = 0; $i < strlen($password); $i++) {
        $ascii_value = ord($password[$i]);
        $encrypted_password .= chr($ascii_value + $shift);
    }
    return $encrypted_password;
}

// Hàm mã hóa mật khẩu bằng phương pháp mã hóa có sẵn (SHA-256)
function standard_encrypt_password($password) {
    return hash('sha256', $password);
}

// Xử lý dữ liệu form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kiểm tra username
    if (!check_username($username)) {
        echo "Username không được chứa ký tự trắng!";
    } 
    // Kiểm tra password
    elseif (!check_password($password)) {
        echo "Password phải có ít nhất 6 ký tự, 1 ký tự viết hoa, và 1 ký tự đặc biệt (#, @, ~, ^, *).";
    } 
    // Nếu kiểm tra thành công, thực hiện mã hóa mật khẩu
    else {
        // Mã hóa mật khẩu theo ASCII (dịch chuyển 1 đơn vị)
        $ascii_encrypted_password = ascii_encrypt_password($password, 1);
        
        // Mã hóa mật khẩu bằng hàm hash SHA-256
        $hashed_password = standard_encrypt_password($password);

        echo "Đăng ký thành công!<br>";
        echo "Mật khẩu sau khi mã hóa ASCII (dịch chuyển 1 đơn vị): " . $ascii_encrypted_password . "<br>";
        echo "Mật khẩu sau khi mã hóa SHA-256: " . $hashed_password;
    }
}
?>
