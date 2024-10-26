<?php include_once "../includes/opening.php"; ?>
<style>
  <?php include '../static/style.css'; ?>
</style>

<?php define("PAGE_TITLE", "User information");?>
<?php // "opening" HTML for the template ?>
<?php template_header();?>


<?php

//$id = $_GET['id'];
$id = 0;
if (isset($_GET['id'])){
	$id = intval($_GET['id']);
}


	if ($id == 0) {
		// Add a user
		$header = "Add User";
	} else {
		// Update a user
		$header = "Update User";		
	}
	print $header;
?>

<?php
$ds_user = loadUsers();
foreach ($ds_user as $user) {
  if ($user->user_id == $id): ?> 
    
	<h1>User Form</h1>;
    <div class="well">
	
	<form action="../controllers/user_controller.php" method="post" class="form-inline">

		<div>First Name:</div>
		<div><input type="text" name="firstname" id="firstname" value="<?php print $user->firstname;?>" class="form-control" /></div>

		<div>Last Name:</div>
		<div><input type="text" name="lastname" id="lastname" value="<?php  print $user->lastname;?>" class="form-control" /></div>

        <div>Password Input:</div>
		<div><input type="text" name="password_input" id="password_input" value="<?php  print $user->password_input;?>" class="form-control" /></div>

        <div>Password Check:</div>
		<div><input type="text" name="password_check" id="password_check" value="<?php  print $user->password_check;?>" class="form-control" /></div>

        <div>Email:</div>
		<div><input type="text" name="primary_email" id="primary_email" value="<?php  print $user->primary_email;?>" class="form-control" /></div>

		<div style="margin-top:10px;">
			<input type="hidden" name="AddUpdateUser" value="1" />
			<input type="hidden" name="user_id" value ="<?php print $user->user_id;?>" />
			<input type="submit" name="btnUpdateUser" value ="<?php print $header;?>" class="btn btn-primary" />
		</div>



	</form>

    </div>
    
    <?php break; ?>
	<?php endif?>
<?php } ?>



	


<?php // "closing" HTML for the template ?>
<?php template_footer();?>
<?php include_once "../includes/closing.php"; ?>