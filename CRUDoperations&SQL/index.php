<?php

require 'config.php';

// наполнить массив из базы данных
$products = [];
$products = $dbh->query('SELECT * FROM sandbox.products');


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Products list</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <p class="h3">
            Products list
            <a href="http://<?= $domain; ?>/create.php" class="btn btn-info">create</a>
        </p>
    </div>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Status</th>
                <th scope="col">Created</th>
                <th scope="col">Control</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($products as $value) { ?>
                <tr>
                    <th scope="row"><?php echo $value['id'] ?></th>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['price'] ?></td>
                    <td><?php if ($value['status'] == 1){
                        echo 'Active';
                    }
                        else {
                            echo 'Off';
                        }?></td>
                    <td><?php echo substr((string)$value['created_at'], 0, 10); ?></td>
<!--                    Можно использовать тип поля Date в базе данных, тогда не прийдется ничего преобразовывать-->
<!--                    Можно использовать substr для поля типа DateTime-->
<!--                    Либо можно сделать через format времени-->
                    <td>
                        <a href="<?php echo 'http://' . $domain . '/delete.php?id=' . $value['id']; ?>">Delete</a>
                        <a href="<?php echo 'http://' . $domain . '/update.php?id=' . $value['id']; ?>">Update</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>