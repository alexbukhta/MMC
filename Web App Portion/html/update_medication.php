<!--
- Computer Science 50
- Alexander Bukhta
- Final Project
- update_medication.php
-
- Inserts into medication history while the arduino administers
-->


<?php
	// configuration
    require("../includes/config.php");

    // insert into the medication history
	query("INSERT INTO medication_history (dr_id, name,medication_applied, datetime) VALUES(?,?,?,NOW())", 
        $_SESSION["id"], $_POST["patient_name"],$_POST["medication_text"]); 

?>
