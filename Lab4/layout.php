<?php function template_header() { ?>


<!DOCTYPE html>
<html>
<head>
	<title><?php print constant('PAGE_TITLE');?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
	
	<header class="bg-primary text-white py-3">
		My Header
	</header>


	<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <li class="nav-item"></li>  
		  <a class="nav-link" href="#">Link 1</a>
    </li>
		<li class="nav-item"></li>  
		  <a class="nav-link" href="#">Link 2</a>
    </li>
	</nav>


<?php } ?>


<?php function template_footer() { ?>
 
	<footer class="bg-light py-4 py-md-5 py-xl-8 border-top border-light-subtle">
	<div class="copyright text-center text-md-start">Copyright Info</div>	
	</footer>


	 <script src="#"></script>
</body>
</html>
<?php } ?>
