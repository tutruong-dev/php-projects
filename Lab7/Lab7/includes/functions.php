<?php
$GLOBALS['BASE'] = dirname(__DIR__);
include $GLOBALS['BASE'] . "/models/User.php";

function loadUsers()
{
    $servername = "localhost"; 
    $username = "root"; 
    $password = "123456"; 
    $databasename = "users_schema"; 

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $databasename); 

    // Kiểm tra kết nối
    if ($conn->connect_error) { 
        die("Connection failed: " . $conn->connect_error); 
    } 

    // Câu lệnh SQL với tên bảng chính xác
    $query = "SELECT * FROM users"; 

    // Thực hiện truy vấn
    $result = $conn->query($query); 

    $ds_user = array();

    // Kiểm tra kết quả và tạo đối tượng User
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
            $user = new User(
                $row["id"],
                $row["username"],
                $row["firstname"],
                $row["lastname"],
                $row["password_input"],
                $row["password_check"],
                $row["email"]
            );
            $ds_user[] = $user; // Thêm đối tượng User vào mảng
        } 
    } else { 
        echo "0 results"; 
    } 

    $conn->close(); 
    return $ds_user; // Trả về mảng các đối tượng User
}

function displayUsers()
{
    $ds_user = loadUsers();
    echo '<h1>displayUsers</h1>';
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

function displayUsersWithLink()
{
    $ds_user = loadUsers();
    echo '<h1>displayUsersWithLink</h1>';
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

function displayUsersWithLinkToForm()
{
    $ds_user = loadUsers();
    echo '<h1>displayUsersWithLinkToForm</h1>';
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
    echo '</tbody></table>';
}
