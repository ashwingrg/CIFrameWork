<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>static/css/style.css"  /><!--importing style.css-->
    </head>
    <body>
    <div id="container">
    <h1>Welcome to login page</h1>
        <div class="form">
            <?php
                if(isset($msg))
                {
                    ?>
                        <div style="border:1px solid red; color: red; padding: 14px;">
                            <?php echo $msg; ?>
                        </div>
                    <?php
                }
            ?>

        <form action="<?php echo base_url(); ?>login" method="post">
            Username:<input type="text" class="input" name="username" placeholder="Enter your username" required><br>
            Password:<input type="password" style="margin-left: 12px;" class="input"  name="loginpsw" placeholder="Enter password" required><br>
            <input type="submit" style="margin-left: 75px; cursor: pointer;" name="subm" class="check" value="Login">
            <input type="checkbox" style="cursor: pointer;">Keep me signed in
        </form>
        </div>
        <a href="<?php base_url()?>signup" style="border: 1px solid royalblue; text-decoration: none;">Signup</a>
    </div>
    </body>
</html>