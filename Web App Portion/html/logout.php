<!--
- Computer Science 50
- Alexander Bukhta
- Final Project
- logout.php
-
- Acts as a controller for logging the user out
-->

<?php

    // configuration
    require("../includes/config.php"); 

    // log out current user, if any
    logout();

    // redirect user
    redirect("login.php");

?>
