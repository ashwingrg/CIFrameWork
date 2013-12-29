<html>
<head>
    <title></title>
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
</div>

<a href="<?php echo  base_url(); ?>mail">Send Mail</a>

<h2>Users</h2>
<hr />
<table border="0">
    <tr>
        <th>SN</th>
        <th>ID</th>
        <th>Username</th>
        <th>Name</th>
        <th></th>
    </tr>
    <?php
        $i = 1;
        foreach($data as $d)
        {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $d->getUid(); ?></td>
                <td><?php echo $d->getUsername(); ?></td>
                <td><?php echo $d->getName(); ?></td>
                <td>
                    <form action="<?php echo base_url(); ?>users/delete" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $d->getUid(); ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                    <?php if ($d->getUserType() == "a") { ?>
                    <a href="<?php echo base_url(); ?>users/update/<?php echo $d->getUid(); ?>">Update</a>
                    <?php } ?>
                </td>

            </tr>
            <?php
        }
    ?>

</table>
</body>



</html>