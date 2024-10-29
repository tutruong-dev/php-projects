<?php include_once "../includes/opening.php"; ?>
<style>
  <?php include '../static/style.css'; ?>
</style>

<?php define("PAGE_TITLE", "User information"); ?>
<?php template_header(); // "opening" HTML for the template ?>

<?php
// Kiểm tra và xác định hành động (Add hoặc Update)
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$header = ($id == 0) ? "Add User" : "Update User";
print "<h1>$header</h1>";
?>

<div class="well">
  <form action="../controllers/user_controller.php" method="post" class="form-inline">
    <?php
    // Tải danh sách user
    $user = null;
    if ($id != 0) {
        // Tìm kiếm user theo id
        $ds_user = loadUsers();
        foreach ($ds_user as $u) {
            if ($u->user_id == $id) {
                $user = $u;
                break;
            }
        }
    }
    ?>

    <div>Username:</div>
    <div><input type="text" name="username" id="username" value="<?php echo $user ? htmlspecialchars($user->username) : ''; ?>" class="form-control" required /></div>

    <div>First Name:</div>
    <div><input type="text" name="firstname" id="firstname" value="<?php echo $user ? htmlspecialchars($user->firstname) : ''; ?>" class="form-control" required /></div>

    <div>Last Name:</div>
    <div><input type="text" name="lastname" id="lastname" value="<?php echo $user ? htmlspecialchars($user->lastname) : ''; ?>" class="form-control" required /></div>

    <div>Password Input:</div>
    <div><input type="password" name="password_input" id="password_input" value="<?php echo $user ? htmlspecialchars($user->password_input) : ''; ?>" class="form-control" required /></div>

    <div>Password Check:</div>
    <div><input type="password" name="password_check" id="password_check" value="<?php echo $user ? htmlspecialchars($user->password_check) : ''; ?>" class="form-control" required /></div>

    <div>Email:</div>
    <div><input type="email" name="primary_email" id="primary_email" value="<?php echo $user ? htmlspecialchars($user->primary_email) : ''; ?>" class="form-control" required /></div>

    <div style="margin-top:10px;">
      <input type="hidden" name="user_id" value="<?php echo $id; ?>" />
      <input type="submit" name="btnUpdateUser" value="<?php echo $header; ?>" class="btn btn-primary" />
    </div>
  </form>
</div>

<?php template_footer(); // "closing" HTML for the template ?>
<?php include_once "../includes/closing.php"; ?>
