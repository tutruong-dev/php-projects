<?php
$GLOBALS['BASE'] = dirname(__DIR__);
include $BASE . "/models/User.php";
function loadUsers()
{
  $ds_user = array();
  $users_file = fopen("../files/users.csv", "r");
  while (!feof($users_file)) {
    $line = fgets($users_file);
    $user_arr = explode(',', $line);
    $user_id = $user_arr[0];
    $username = $user_arr[1];
    $firstname = $user_arr[2];
    $lastname = $user_arr[3];
    $password_input = $user_arr[4];
    $password_check = $user_arr[5];
    $primary_email =  $user_arr[6];
    $user = new User($user_id, $username, $firstname, $lastname, $password_input, $password_check, $primary_email);
    array_push($ds_user, $user);
  }
  fclose($users_file);
  return $ds_user;
}

function displayUsers()
{
  $ds_user = loadUsers();
  echo '<h1>displayUsers<h1/>';
  echo ' <table class="table-primary table-bordered">
    <thead>
      <tr>
        <td>Username</td>
        <td>Fullname</td>
      </tr>
    </thead>
    <tbody>';
  foreach ($ds_user as $user) {
    echo ' <tr>
     <td>' . $user->username . '</td>
     <td>' . $user->fullName() . '</td>
   </tr>';
  }
  echo  '
    </tbody>
  </table>';
}


function displayUsersWithLink()
{
  $ds_user = loadUsers();
  echo '<h1>displayUsersWithLink<h1/>';
  echo '<table class="table-primary table-bordered">
    <thead>
      <tr>
        <td>Username</td>
        <td>Fullname</td>
      </tr>
    </thead>
    <tbody>';
  foreach ($ds_user as $user) {
    echo ' <tr>
     <td><a href="userinfo.php?id=' . $user->user_id . '">' . $user->username . '</a></td>
     <td>' . $user->fullName() . '</td>
   </tr>';
  }
  echo  '
    </tbody>
  </table>';
}

function displayUsersWithLinkToForm()
{
  $ds_user = loadUsers();
  echo '<h1>displayUsersWithLinkToForm<h1/>';
  echo '<table class="table-primary table-bordered">
    <thead>
      <tr>
        <td>Username</td>
        <td>Fullname</td>
      </tr>
    </thead>
    <tbody>';
  foreach ($ds_user as $user) {
    echo ' <tr>
     <td><a href="formuserinfo.php?id=' . $user->user_id . '">' . $user->username . '</a></td>
     <td>' . $user->fullName() . '</td>
   </tr>';
  }
  echo  '
    </tbody>
  </table>';
}


?>

<?php

// Hàm arrayToHTMLTable() nhận một đối số là $entries, đại diện cho kết quả truy vấn
// từ cơ sở dữ liệu dưới dạng đối tượng mysqli_result.
// Hàm này sẽ tạo một bảng HTML để hiển thị thông tin của người dùng với các cột
// bao gồm ID, First Name, Last Name, Email, Username, Password Input, và Password Check.
// Cụ thể:
// 1. Tạo phần tiêu đề cho bảng với các tên cột.
// 2. Sử dụng vòng lặp while để duyệt qua từng dòng kết quả của truy vấn.
// 3. Đối với mỗi dòng, tạo một hàng mới trong bảng với các giá trị tương ứng
//    từ các trường dữ liệu.
// 4. Kết thúc bảng sau khi đã hiển thị tất cả dữ liệu.

    function arrayToHTMLTable($entries){
?>
        <p>Table content</p>
    <table class="table-hover table-bordered">
        <thead>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Username</th>          <!-- Thêm cột Username -->
            <th>Password Input</th>     <!-- Thêm cột Password Input -->
            <th>Password Check</th>     <!-- Thêm cột Password Check -->
        </thead>
        <tbody>
        <?php
            while ($entry = mysqli_fetch_array($entries)) {
        ?>
                <tr>
                <td><?php print htmlspecialchars($entry['id']); ?></td>
                    <td><?php print htmlspecialchars($entry['firstname']); ?></td>
                    <td><?php print htmlspecialchars($entry['lastname']); ?></td>
                    <td><?php print htmlspecialchars($entry['email']); ?></td>
                    <td><?php print isset($entry['username']) ? htmlspecialchars($entry['username']) : 'N/A'; ?></td>  <!-- Hiển thị Username -->
                    <td><?php print isset($entry['password_input']) ? htmlspecialchars($entry['password_input']) : 'N/A'; ?></td>  <!-- Hiển thị Password Input -->
                    <td><?php print isset($entry['password_check']) ? htmlspecialchars($entry['password_check']) : 'N/A'; ?></td>  <!-- Hiển thị Password Check -->
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
<?php
    }
?>
<?php
function display_users($connection) {
    // Câu lệnh SQL để lấy thông tin người dùng
    $sql = "SELECT id, firstname, lastname, email, username, password_input, password_check FROM Users";
    $result = mysqli_query($connection, $sql);

    // Kiểm tra kết quả truy vấn
    if (!$result || mysqli_num_rows($result) == 0) {
        echo "<h1>No data</h1>"; // Nếu không có dữ liệu
    } else {
        echo '<h1>User List</h1>';
        echo '<table class="table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password Input</th>
                        <th>Password Check</th>
                    </tr>
                </thead>
                <tbody>';

        // Lặp qua kết quả và hiển thị thông tin người dùng
        while ($entry = mysqli_fetch_array($result)) {
            echo '<tr>
                    <td>' . htmlspecialchars($entry['id']) . '</td>
                    <td>' . htmlspecialchars($entry['firstname']) . '</td>
                    <td>' . htmlspecialchars($entry['lastname']) . '</td>
                    <td>' . htmlspecialchars($entry['email']) . '</td>
                    <td>' . htmlspecialchars($entry['username']) . '</td>
                    <td>' . htmlspecialchars($entry['password_input']) . '</td>
                    <td>' . htmlspecialchars($entry['password_check']) . '</td>
                  </tr>';
        }

        echo '</tbody>
              </table>';
    }
}
?>

<?php
function display_users_with_action($connection, $query_string, $action_text) {
    // Câu lệnh SQL để lấy thông tin người dùng
    $sql = "SELECT id, username, firstname, lastname, email FROM Users";
    $result = mysqli_query($connection, $sql);

    // Kiểm tra kết quả truy vấn
    if (!$result || mysqli_num_rows($result) == 0) {
        echo "<h1>No data</h1>"; // Nếu không có dữ liệu
    } else {
        echo '<h1>User List</h1>';
        echo '<table class="table-hover table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

        // Lặp qua kết quả và hiển thị thông tin người dùng
        while ($entry = mysqli_fetch_array($result)) {
            $user_id = htmlspecialchars($entry['id']);
            $firstname = htmlspecialchars($entry['firstname']);
            $lastname = htmlspecialchars($entry['lastname']);
            $email = htmlspecialchars($entry['email']);

            // Tạo hyperlink cho hành động xóa
            $action_link = $query_string . $user_id;

            echo '<tr>
                    <td>' . $user_id . '</td>
                    <td>' . $firstname . '</td>
                    <td>' . $lastname . '</td>
                    <td>' . $email . '</td>
                    <td><a href="' . $action_link . '">' . htmlspecialchars($action_text) . '</a></td>
                  </tr>';
        }

        echo '</tbody>
              </table>';
    }
}
?>
