<!--
- Computer Science 50
- Alexander Bukhta
- Final Project
- index.php
-
- Acts as a controller for the main function of defining user data
- and storing it in a presentable table.
-->

<?php

    // configuration
    require("../includes/config.php"); 
   
    //Retrieve information in the account 
    $rows = query("SELECT * FROM patients WHERE dr_id = ?", $_SESSION["id"]);
    
    //Define a new variable array that will store the information
    $positions = [];
    
    //Itterate over each row
    foreach($rows as $row)
    {
       $positions[]=
       [
       "name" =>$row["name"],
       "medication_one" =>$row["medication_one"],
       "medication_two" =>$row["medication_two"]
       ];
         
    }
   
    //Create the page with the updated information using the terms of the user account
    render("patient_info.php", ["positions" => $positions, "title"=>"Patient Information"]);

?>



