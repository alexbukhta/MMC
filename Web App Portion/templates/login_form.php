<!-A Simple form allowing log-in functionality->
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
            <style type="text/css">
              body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #f5f5f5;
              }

              .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                   -moz-border-radius: 5px;
                        border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                        box-shadow: 0 1px 2px rgba(0,0,0,.05);
              }
              .form-signin .form-signin-heading,
              .form-signin .checkbox {
                margin-bottom: 10px;
              }
              .form-signin input[type="text"],
              .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
              }
            </style>
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <center>
            <h1> Please Log In:</h1>
            <form action="login.php" method="post">
                <fieldset>
                    <div class="control-group">
                        <input autofocus name="username" placeholder="Username" type="text"/>
                    </div>
                    <div class="control-group">
                        <input name="password" placeholder="Password" type="password"/>
                    </div>
                    <div class="control-group">
                        <button type="submit" class="btn">Log In</button>
                    </div>
                </fieldset>
            </form>
            <div>
                or <a href="register.php">register</a> for an account
            </div>
        </center>
        <script src="../js/jquery-latest.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>
