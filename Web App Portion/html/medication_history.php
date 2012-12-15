<!--
- Computer Science 50
- Alexander Bukhta
- Final Project
- medication_history.php
-
- Simply acts as a controller for generating a table with all of the
- medication transactions
-->

<?php
    // configuration
    require("../includes/config.php");
    
    //Get the entire history of the user
    $rows = query("SELECT * FROM medication_history WHERE dr_id = ?", $_SESSION["id"]);
    $doctor = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        
    //Transfer information from that history to the template for display
    render("medication_history.php", ["title"=> "Portfolio", "rows"=>$rows, "doctor"=>$doctor]); 
  
?>
