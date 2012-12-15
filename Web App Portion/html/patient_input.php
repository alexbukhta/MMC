<!--
- Computer Science 50
- Alexander Bukhta
- Final Project
- patient_input.php
-
- Simply acts as a controller for accepting patients into the database
-->

<?php

    // configuration
    require("../includes/config.php"); 
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["patient_name"]))
        {
            apologize("You must provide a Patient's Name!");
        }
        
        else if (empty($_POST["medication_one"]))
        {
            apologize("You must provide the Patient's first active Medication!");
        }
        
        else if (empty($_POST["medication_two"]))
        {
            apologize("You must provide the Patient's second active medication!");
        }
        
        //Add a row with the patient's information
        query("INSERT INTO patients (dr_id, name, medication_one, medication_two) VALUES(?,?,?,?) 
            ON DUPLICATE KEY UPDATE medication_one = VALUES(medication_one), medication_two = VALUES(medication_two)", 
            $_SESSION["id"], $_POST["patient_name"], $_POST["medication_one"], $_POST["medication_two"]);
        
        //Add a row into the history column that also takes into account the time
        query("INSERT INTO patient_history (dr_id, name,medication_one, medication_two, datetime) VALUES(?,?,?,?,NOW())", 
        $_SESSION["id"], $_POST["patient_name"],$_POST["medication_one"],$_POST["medication_two"]); 
        
        //Redirect to the newly updated patient information
        redirect("index.php");
    }
     
      //Render input form
    else
    {
        render("patient_input_form.php", ["title" => "Input Patient Information"]);
    }
?>


