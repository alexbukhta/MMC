<!--
- Computer Science 50
- Alexander Bukhta
- Final Project
- medicate.php
-
- Acts as a controller for injecting the patient with medicine
-->

<?php
    // configuration
    require("../includes/config.php");

    //redirect to the medication form
    render("medicate_form.php", ["title" => "Apply Medication"]);
   
?>
   
