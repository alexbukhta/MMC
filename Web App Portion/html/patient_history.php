<!--
- Computer Science 50
- Alexander Bukhta
- Final Project
- patient_history.php
-
- Simply acts as a controller for generating a table with all of the
- patient entries into the system
-->

<?php
    // configuration
    require("../includes/config.php");
    
    //Get the entire history of the user
    $rows = query("SELECT * FROM patient_history WHERE dr_id = ?", $_SESSION["id"]);
        
    //Transfer information from that history to the template for display
    render("patient_history.php", ["title"=> "Patient History", "rows"=>$rows]); 
  
?>
