<?php include_once "../includes/opening.php"; ?>
<style>
  <?php include '../static/style.css'; ?>
</style>

<?php define("PAGE_TITLE", "User information");?>
<?php // "opening" HTML for the template ?>
<?php template_header();?>


<?php

$id = $_GET['id'];

$ds_user = loadUsers();
foreach ($ds_user as $user) {
  if ($user->user_id == $id) {
    echo '<h1>User Information<h1/>';
    echo ' <table class="table-primary table-bordered">
    <thead>
      <tr>
        <td>UserID</td>
        <td>Username</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Password Input</td>
        <td>Password Check</td>
        <td>Primary Email</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>' . $user->user_id . '</td>
        <td>' . $user->username . '</td>
        <td>' . $user->firstname . '</td>
        <td>' . $user->lastname . '</td>
        <td>' . $user->password_input . '</td>
        <td>' . $user->password_check . '</td>
        <td>' . $user->primary_email . '</td>
      </tr>
    </tbody>
  </table>';
    break;
  }
}
?>
<form action="users.php">
  <button type="submit">GO BACK</button>
</form>
	


<?php // "closing" HTML for the template ?>
<?php template_footer();?>