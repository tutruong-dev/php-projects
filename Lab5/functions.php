<?php
include 'User.php';

function loadUsers() {
    $users = [];
    $file = fopen('files\users.csv', 'r');

    // Kiểm tra nếu không thể mở file
    if (!$file) {
        die("Unable to open file!");
    }

    // Bỏ qua hàng tiêu đề (header)
    fgetcsv($file);

    // Đọc từng hàng từ file
    while (($data = fgetcsv($file)) !== FALSE) {
        if (count($data) < 7) {
            continue; // Bỏ qua hàng không đủ dữ liệu
        }
        $user = new User($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
        $users[] = $user;
    }

    fclose($file);
    return $users;
}

function displayUsers() {
    $users = loadUsers();

    // HTML và Bootstrap để tạo bảng
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Danh sách người dùng</title>
    </head>
    <body>
        <div class="container mt-4">
            <h2>Danh sách user dưới dạng bảng</h2>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user->getUserName()) ?></td>
                            <td><?= htmlspecialchars($user->fullName()) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
    </html>
    <?php
}

function displayUsersWithLink() {
    $users = loadUsers();

    // HTML và Bootstrap để tạo bảng
    ?>
    <!DOCTYPE html>
    <html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Danh sách người dùng</title>
    </head>
    <body>
        <div class="container mt-4">
            <h2>Danh sách user kèm link dưới dạng bảng</h2>
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><a href="userinfo.php?id=<?= htmlspecialchars($user->getUserID()) ?>"><?= htmlspecialchars($user->getUserName()) ?></a></td>
                            <td><?= htmlspecialchars($user->fullName()) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
    </html>
    <?php
}
?>
