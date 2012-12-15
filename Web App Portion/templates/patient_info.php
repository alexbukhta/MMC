<!-Simple for to display patient information->
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
    <link href="../css/bootstrap.css" rel="stylesheet">
    <style>
        body   
        {
            padding-top: 60px; 
        }
    </style>
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
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
                <li class="active"><a href="index.php">Patient Information</a></li>
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
        <div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Medication 1</th>
                        <th>Medication 2</th>
                    </tr>
                </thead> 
                    <?php
                        foreach ($positions as $position) 
                        {
                            print("<tr>");
                            print("<td>{$position["name"]}</td>"); 
                            print("<td>{$position["medication_one"]}</td>");  
                            print("<td>{$position["medication_two"]}</td>"); 
                            print("</tr>");
                        }
                    ?>   
            </table>
        </div>
        <script src="../js/jquery-latest.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
