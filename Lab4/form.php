<?php include "layout.php"; ?>


<?php define("PAGE_TITLE", "About us");?>
<?php // "opening" HTML for the template ?>
<?php template_header();?>


	<div class="container">
		<h2>Form</h2>
    <form action="process_form.php" method="GET">
      <!-- Combobox Tháng -->
      <div class="form-group">
        <label for="month">Tháng:</label>
        <select class="form-select" name="month" id="month">
          <option value="Jan">Jan</option>
          <option value="Feb">Feb</option>
          <option value="Mar">Mar</option>
          <option value="Apr">Apr</option>
          <option value="May">May</option>
          <option value="Jun">Jun</option>
          <option value="Jul">Jul</option>
          <option value="Aug">Aug</option>
          <option value="Sep">Sep</option>
          <option value="Oct">Oct</option>
          <option value="Nov">Nov</option>
          <option value="Dec">Dec</option>
        </select>
      </div>

      <!-- Combobox Thống kê doanh thu -->
      <div class="form-group">
        <label for="stat">Thống kê doanh thu:</label>
        <select class="form-select" name="stat" id="stat">
          <option value="max">Doanh thu cao nhất</option>
          <option value="min">Doanh thu thấp nhất</option>
        </select>
        <br>
      </div>
      <!-- Nút Submit -->
      <input type="submit" class="btn btn-primary" value="Submit" />
    </form>
	</div>


<?php // "closing" HTML for the template ?>
<?php template_footer();?>