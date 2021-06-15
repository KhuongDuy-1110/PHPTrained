<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student list</title>
</head>

<body>
<div class="form">

    <form>
        <h2>Student list</h2>
        <a href="<?php echo site_url('Welcome/index/'); ?>" style="padding-bottom: 20px;">Add</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th id="imp">Email</th>
                <th style="width:100px;"></th>
            </tr>
            <?php
                foreach ($results as $row):
            ?>
            <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->name; ?></td>
                <td><?php echo $row->email; ?></td>
                <td style="text-align:center;">
                    <a href="<?php echo site_url('UserController/edit') ?>/<?php echo $row->id; ?>">Edit</a>&nbsp;
                    <a href="<?php echo site_url('UserController/delete') ?>/<?php echo $row->id; ?>" onclick="return window.confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php
                endforeach;
            ?>
        </table>
        <?php if (isset($links)) { ?>
            <?php echo $links ?>
        <?php } ?>
    </form>
</div>
<style>
    body {
        background: #59ABE3;
        margin: 0;
    }

    .form {
        width: 680px;
        background: #e6e6e6;
        border-radius: 8px;
        box-shadow: 0 0 40px -10px #000;
        margin: 50px auto;
        padding: 20px 30px;
        box-sizing: border-box;
        font-family: 'Montserrat', sans-serif;
    }

    h2 {
        margin: 10px 0;
        padding-bottom: 10px;
        width: 250px;
        color: #78788c;
        /* border-bottom: 3px solid #78788c */
    }

    table {
        width: 100%;
        color: #78788c;
    }

    th {
        border-right: 1px solid #78788c;
    }

    #imp{
        border: none;
    }

    th:last-child {
        border: none;
    }
    td {
        text-align: center;
    }
    a{
        text-decoration: none;
        font-size: 15px;
        color: crimson;

    }
    .numlink{
        padding: 10px;
    }
    .pagination{
        margin-top: 10px;
    }
</style>
</body>

</html>