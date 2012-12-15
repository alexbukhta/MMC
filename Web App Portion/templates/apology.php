<!- A simple program that apologizes for missing information or an error->
<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	     	<?php if (isset($title)): ?>
	            <title>MMC: <?= htmlspecialchars($title) ?></title>
	        <?php else: ?>
	            <title>Mobile Medical Control</title>
	        <?php endif ?>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">
    	<link href="css/bootstrap.css" rel="stylesheet">
    	<style>
      	body 
      	{
        	padding-top: 60px; 
      	}
    	</style>
    	<link href="css/bootstrap-responsive.css" rel="stylesheet">
			<div class="navbar navbar-inverse navbar-fixed-top">
	      	<div class="navbar-inner">
	        <div class="container">
	          	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	            	<span class="icon-bar"></span>
	            	<span class="icon-bar"></span>
	            	<span class="icon-bar"></span>
	            	<span class="icon-bar"></span>
	            	<span class="icon-bar"></span>
	            	<span class="icon-bar"></span>
	          	</a>
	        <div class="nav-collapse collapse">
	            <ul class="nav">
	              	<li><a href="index.php">Patient Information</a></li>
	              	<li><a href="patient_input.php">Patient Input</a></li>
	              	<li><a href="patient_history.php">Patient History</a></li>
	              	<li><a href="medicate.php">Apply Medication</a></li>
	              	<li><a href="medication_history.php">Medication History</a></li>
	              	<li><a href="logout.php">Log Out</a></li>
	            </ul>
	        </div>
	        </div>
	      	</div>
	    	</div>
	</head>
	<body>
		<p class="lead text-error">
			Sorry!
		</p>
		<p class="text-error">
			<?= htmlspecialchars($message) ?>
		</p>
		<a href="javascript:history.go(-1);">Back</a> 
    	<script src="../js/jquery-latest.js"></script>
    	<script src="../js/bootstrap.min.js"></script>
    </body>
</html>

