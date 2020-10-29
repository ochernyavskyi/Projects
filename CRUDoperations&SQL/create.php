<?php

include 'config.php';


if (filter_has_var(INPUT_POST, 'btn-create')) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    $sql = "INSERT INTO sandbox.products (name, price, status) VALUES (:name, :price, :status)";
    $query = $dbh->prepare($sql);
    $query->execute([':name' => $name, ':price' => $price, ':status' => $status]);
    header('Location: http://' . $domain);
    exit;
//     логика создания

//    после того как все будет работать переадресовать на главную страницу

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create page</title>

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
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form action="create.php" method="post">
                <div class="form-group">
                    <p class="h3">Create product form:</p>
                </div>
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Price: </label>
                    <input type="text" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label>Status: </label>
                    <input type="text" name="status" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="btn-create" value="create" class="btn btn-form">
                </div>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
</body>
</html>