<?php
    
    // connect DB
    $servername = "localhost";
    $username = "root";
    $password = "123456";             // your password
    $schema = "users_schema";   // DB: users_schema

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // select the right database
    mysqli_select_db($conn, $schema);

    echo "Connected successfully" . "<br>";
    
    include "layout.php";
    include "functions.php";

    // Biến $conn dùng để lưu trữ kết nối tới CSDP MySQL.
    // Nó được khởi tạo bởi hàm 'mysqli_connect', dùng các thông tin như tên máy chủ ($servername),
    // tên người dùng ($username), và mật khẩu ($password).
    // Biến này sẽ được sử dụng trong suốt quá trình làm việc với cơ sở dữ liệu.
?>