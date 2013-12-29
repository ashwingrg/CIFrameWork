<?php
?>
<html>
    <head><title><?php echo $top.$signupname;?></title>
    <link rel="stylesheet" type="text/css" href="<?php base_url(); ?>static/css/style.css"  />
    </head>
    <body>
    <div id="container">
        <h1>Sign up for free</h1>
        <form class="form" form action="<?php base_url();?>signup" method="post">
            UserID:<input type="number" placeholder="user id" name="uid" required><br>
            Username: <input type="text" class="input" name="username" placeholder="Enter Username" required><br>
            Password: <input type="password" style="margin-left:11px ;"class="inputs" name="signuppsw" placeholder="Enter password" required><br>
            Name: <input type="text" placeholder="Your name" name="name" required><br>
            User Type: <input type="text" placeholder="user type" name="user_type" required><br>
            User Role:<input type="text" placeholder="user role" name="user_role" required><br>
            User Status:<input type="text" placeholder="user status" name="user_status" required><br>
            User Timestamp:<input type="text" placeholder="user timestamp" name="user_timestamp" required><br>

            <input type="submit"name="signup" style="font-family: arial; font-size: 13px; color: #0000FF; margin-left: 72px; cursor: pointer;" value="Signup">
        </form>
        <?php
        echo $uid;
        echo $username;
        echo $password;
        echo $name;
        echo $user_type;
        echo $user_role;
        echo $user_status;
        echo $user_timestamp;
        ?>
        <a href="<?php base_url()?>login" style="border: 1px solid royalblue; text-decoration: none;">Login</a>
    </div>

    </body>

</html>