<!-Simple for in order to input a patient into the database->

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
                            <li class="active"><a href="patient_input.php">Patient Input</a></li>
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
    <form action="patient_input.php" method="post">
        <center>
            <fieldset>
                <div class="control-group">
                    <input autofocus name="patient_name" placeholder="Patient Name:" type="text"/>
                </div>
                <div class="control-group">
                    <input autofocus name="medication_one" placeholder="Medication 1:" type="text"/>
                </div>
                <div class="control-group">
                    <input autofocus name="medication_two" placeholder="Medication 2:" type="text"/>
                </div>
                <div class="control-group">
                    <button type="submit" class="btn">Enter Patient!</button>
                </div>
            </fieldset>
        </center
    </form>
        <script src="../js/jquery-latest.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
