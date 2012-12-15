<!-Simple Registration form for doctors to register accounts->
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
    </head>
    <body>
        <form action="register.php" method="post">
            <center>
                <fieldset>
                    <div class="control-group">
                        <input autofocus name="username" placeholder="Username" type="text"/>
                    </div>
                    <div class="control-group">
                        <input name="password" placeholder="Password" type="password"/>
                    </div>
                    <div class="control-group">
                        <input name="confirmation" placeholder="Re-enter Password" type="password"/>
                    </div>
                    <div class="control-group">
                        <button type="submit" class="btn">Register</button>
                    </div>
                </fieldset>
                </form>
                <div>
                    or <a href="login.php">log in</a>
                </div>
            </center>
        <script src="../js/jquery-latest.js"></script>    
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
