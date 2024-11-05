
<?php
  include_once '../includes/opening.php'; 
?>
<style>
  <?php include '../static/style.css'; ?>
</style>

<?php define("PAGE_TITLE", "User");?>
<?php // "opening" HTML for the template ?>
<?php template_header();?>

  <h1>Users from file</h1>
	<div class="container">
        
	</div>
    <?php   displayUsers();
            displayUsersWithLink();
            displayUsersWithLinkToForm();  
    ?>
  
  <h1>Users from DB</h1>
  <?php
  // Bang du lieu users
    $sql = "SELECT id, firstname, lastname, email, username, password_input, password_check FROM Users";
    $result = mysqli_query($conn, $sql); // Thực hiện truy vấn SQL lưu trong biến $sql trên kết nối $conn.
    // Nếu truy vấn thành công, kết quả trả về dưới dạng đối tượng mysqli_result và được lưu trong $result.
    // Nếu truy vấn thất bại, $result sẽ là false.
    echo "<h1> Result of calling arrayToHTMLTable() function </h1>";  
    arrayToHTMLTable($result);
  ?>

  <?php
    
    $connection = $conn;
    $query_string = "controllers/user_controller.php?delete_user_id=";
    $action_text = "Delete";
    display_users_with_action($conn, $query_string, $action_text);
  ?>

<?php // "closing" HTML for the template ?>
<?php template_footer();?>
<?php include_once "../includes/closing.php"; ?>