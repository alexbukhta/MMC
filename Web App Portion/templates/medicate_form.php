<!-Simple form so that doctors can choose a patient and medication to apply->
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
                            <li class="active"><a href="medicate.php">Apply Medication</a></li>
                            <li><a href="medication_history.php">Medication History</a></li>
                            <li><a href="logout.php">Log Out</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </head>
        <body>
            <script>
            function loadMedications(select)
            {
                console.log($("#" + select + " option:selected").val()) ;
                $("#medication_select").css("display","");
                $("#text").css("display","");

            }
            function SendMedication()
            {   
                var medicationId = $("#medication_select option:selected").val(); 
                var medicationText = $("#medication_select option:selected").html(); 
                var patientName = $("#patient_select option:selected").html(); 
                $.ajax({
                    url: "update_medication.php",
                    type: "POST",
                    async:false,
                    data: { medication_text: medicationText, patient_name: patientName}
                });
                $.ajax({
                    url: "http://192.168.1.103/?" + medicationId,
                    type: "GET",
                    success: function(html){
                        $("#result").html(html);
                    }
                });
            }
            </script>

            <form>
            <center>
                <p>Please choose a Patient:</p>
                    <div class="control-group">
                        <select id="patient_select" onchange="loadMedications(this.id)">
                            <option selected="selected" id="1">Please Select</option>
                        <?php
                            $rows = query("SELECT * FROM patients WHERE dr_id = ?", $_SESSION["id"]);
                            $row_counter = 0;
                            foreach ($rows as $row) 
                            {
                                $row_counter++;
                                echo'<option id="' . $row_counter . '">' . $row["name"] . '</option>';
                            }
                        ?>
                        </select>
                    </div>
                    <div id="text" style="display:none">
                        <br>Please select the Patient's Medication</br>
                    </div>
                    <div class="control-group">
                        <select id="medication_select" style="display:none">
                        <?php
                            echo"Please choose the Patient's Medication";
                            echo'<option value= "1" id="' . $row["name"] . '_1">' . $row["medication_one"] . '</option>';
                            echo'<option value= "2" id="' . $row["name"] . '_2">' . $row["medication_two"] . '</option>';
                        ?>
                        </select>
                    </div>     
                    <div class="control-group">
                        <button type="button" onclick="SendMedication()"class="btn">Medicate!</button>
                    </div> 
                    <div id="result"></div>   
            </center>    
            </form>
            <script src="../js/jquery-latest.js"></script>    
            <script src="../js/bootstrap.min.js"></script>
        </body>
    </html>

