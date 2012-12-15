<!---
- Computer Science 50
- Alexander Bukhta
- Final Project
- register.php
-
- Acts as a controller for the registeration form and stores 
- information about registered users
-->

<?php
    // configuration
    require("../includes/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        
        else if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Your passwords do not match!");
        }
        
        //Add input into result variable
        $result = query("INSERT INTO users (username, hash) VALUES(?, ?)", $_POST["username"], crypt($_POST["password"]));
        
        //if not results are given, apologize
        if ( $result === false)
        {
            apologize("The username is taken!");
        }
        
        //Otherwise define ID and redirect to home page
        else if ( $result !== false)
        {
        $rows = query("SELECT LAST_INSERT_ID() AS id"); 
        $_SESSION["id"] = $rows[0]["id"];
        redirect('index.php');
        }   
    }
    
    else
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }
?>
