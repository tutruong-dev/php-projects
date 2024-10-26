<?php
include "../models/User.php";

function loadUsers() {
    $ds_user = array();
    $users_file = fopen("../files/users.csv", "r");

    // Kiểm tra xem file có mở thành công hay không
    if ($users_file) {
        while (($line = fgets($users_file)) !== false) {
            $user_arr = explode(',', $line);

            // Kiểm tra xem mảng có đủ phần tử hay không
            if (count($user_arr) >= 7) { // Đảm bảo có ít nhất 7 phần tử
                $user_id = $user_arr[0];
                $username = $user_arr[1];
                $firstname = $user_arr[2];
                $lastname = $user_arr[3];
                $password_input = $user_arr[4];
                $password_check = $user_arr[5];
                $primary_email = $user_arr[6];

                // Tạo một đối tượng User và thêm vào danh sách
                $user = new User($user_id, $username, $firstname, $lastname, $password_input, $password_check, $primary_email);
                array_push($ds_user, $user);
            }
        }
        fclose($users_file);
    } else {
        echo "Không thể mở file users.csv.";
    }

    return $ds_user;
}

function displayUsers() {
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
    echo '</tbody>
  </table>';
}

function displayUsersWithLink() {
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
    echo '</tbody>
  </table>';
}

function displayUsersWithLinkToForm() {
  $users = loadUsers();
  echo '<h1>displayUsersWithLinkToForm</h1>'; // Tiêu đề cho bảng
  echo '<table class="table-primary table-bordered">'; // Định dạng bảng
  echo '<thead>
          <tr>
              <th>Username</th>
              <th>Actions</th>
          </tr>
        </thead>';
  echo '<tbody>';
  
  foreach ($users as $user) {
      echo '<tr>';
      echo '<td>' . htmlspecialchars($user->username) . '</td>';
      echo '<td><a href="formuserinfo.php?id=' . htmlspecialchars($user->user_id) . '">View/Edit</a></td>';
      echo '</tr>';
  }
  
  echo '</tbody>';
  echo '</table>';

  // Nút "Create user"
  echo '<form action="formuserinfo.php" method="GET">';
  echo '<button type="submit" name="id" value="0">Create user</button>';
  echo '</form>';
}

