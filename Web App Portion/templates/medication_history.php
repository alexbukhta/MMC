<!-Simple form for inserting medication injection history->
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
                        <li><a href="index.php">Patient Information</a></li>
                        <li><a href="patient_input.php">Patient Input</a></li>
                        <li><a href="patient_history.php">Patient History</a></li>
                        <li><a href="medicate.php">Apply Medication</a></li>
                        <li class="active"><a href="medication_history.php">Medication History</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </head>   
    <body>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Medication Applied</th>
                    <th>Date Applied</th>
                    <th>Applied by</th>
                </tr>
            </thead> 
            <tbody>
                <?php
                    foreach ($rows as $row) 
                    {
                        print("<tr>");
                        print("<td>{$row["name"]}</td>"); 
                        print("<td>{$row["medication_applied"]}</td>");   
                        print("<td>" . date("n/j/y, g:ia", strtotime($row["datetime"])) . "</td>");  
                        print("<td>{$doctor[0]["username"]}</td>"); 
                        print("</tr>");
                    }
                ?>
            </tbody>
        </table>
        <script src="../js/jquery-latest.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>


    
    
