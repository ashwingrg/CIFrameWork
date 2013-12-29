<html>
<head>
    <title>Edit Profile</title>
    <style>
        body{ width: 100%; height: auto; background:#eeeeee;}
        #container { width: 100%; height: auto; margin: 0px; padding: 0px;}
        .me { padding: 15px; background: #00CC00;}
    </style>
</head>
<body>
<div id="container">
    <table>
        <tr style="padding-left: 15px;">
            <td class="me">Home</td>
            <td class="me"><a href="<?php echo base_url(); ?>users">Users</a> </td>
            <td class="me"><a href="<?php echo base_url(); ?>logout">Logout</a> </td>
            <td>Welcome, <?php echo $name; ?></td>
        </tr>
    </table>
    <?php
        if($msg == true)
        {
            echo "Record Updated successfully.";
        }
    ?>
    <form method="post" action="<?php echo base_url(); ?>users/update/<?php echo $data[0]->getUid(); ?>">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" placeholder="Name" value="<?php echo $data[0]->getName(); ?>" /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update"></td>
            </tr>
        </table>
    </form>
</div>

</body>

</html>