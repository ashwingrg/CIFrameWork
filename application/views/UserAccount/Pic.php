<html>
<head>
    <title>Upload Your Picture</title>
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
            <td class="me"><a href="<?php echo base_url(); ?>pic">Profile Pictures</a> </td>
            <td class="me"><a href="<?php echo base_url(); ?>logout">Logout</a> </td>
            <td>Welcome, <?php echo $name; ?></td>
        </tr>
    </table>
</div>
<?php
    if($msg == true)
    {
        echo "Upload was success.";
    }
    if(isset($error))
    {
        echo $error;
    }
?>
<form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>pic">
    <input type="file" name="myPic" />
    <input type="submit" value="Upload">
</form>
</body>

</html>