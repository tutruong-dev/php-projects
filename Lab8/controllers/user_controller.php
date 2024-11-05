<?php include_once '../includes/opening.php'; ?>
<?php include_once 'users/users.php';
// Delete
if (array_key_exists('delete_user_id', $_GET)) {
    $user_id = intval($_GET['delete_user_id']);
    
    // Giả sử bạn đã kết nối đến cơ sở dữ liệu qua biến $conn.
    $sql = "DELETE FROM Users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    // Liên kết tham số với câu lệnh SQL
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    
    // Thực hiện câu lệnh
    if (mysqli_stmt_execute($stmt)) {
        // Nếu xóa thành công, điều hướng về trang users.php với query string.
        header("Location: ./users/users.php?action=user-deleted&user_id=" . $user_id);
        exit; // Dừng script sau khi redirect
    } else {
        // Nếu có lỗi khi xóa, hiển thị thông báo lỗi
        echo "ERROR";
    }

    // Đóng câu lệnh đã chuẩn bị
    mysqli_stmt_close($stmt);
}
?>
