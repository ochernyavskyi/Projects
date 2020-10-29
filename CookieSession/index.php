<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Homework 11</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form action="handler.php" method="post" style="margin: 50px auto 0;">
                <div class="form-group">
                    <p class="h3">Count: <?php echo isset($_SESSION['count']) ? $_SESSION['count'] : 0; ?></p>
                </div>
                <div class="form-group">
                    <input type="submit" name="btn-increment" value="increment" class="btn btn-primary">
                    <input type="submit" name="btn-decrement" value="decrement" class="btn btn-primary">
                    <input type="submit" name="btn-clear-counter" value="clear" class="btn btn-primary">
                </div>
            </form>
        </div>
        <div class="row">
            <form action="handler.php" method="post" style="margin: 150px auto 0;" class="col-sm-6">
                <div class="form-group">
                    <p class="h3">Settings:</p>
                </div>
                <div class="row" style="margin-top: 50px;">
                    <div class="col-sm-4">
                        <label>Allow notify</label>
                        <?php if (isset($_COOKIE['settings']['notifications'])) { ?>
                            <input type="checkbox" name="allowNotifications" class="form-control" checked>
                        <?php } else { ?>
                            <input type="checkbox" name="allowNotifications" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="col-sm-4">
                        <label>Show inform</label>
                        <?php if (isset($_COOKIE['settings']['information'])) { ?>
                        <input type="checkbox" name="showInformation" class="form-control" checked>
                        <?php } else { ?>
                            <input type="checkbox" name="showInformation" class="form-control">
                        <?php } ?>
                    </div>
                    <div class="col-sm-4">
                        <label>Hide phone</label>
                        <?php if (isset($_COOKIE['settings']['phoneVisible'])) { ?>
                        <input type="checkbox" name="hidePhone" class="form-control" checked>
                            <?php } else { ?>
                            <input type="checkbox" name="hidePhone" class="form-control">
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" value="save" class="btn btn-primary" name="save-btn" style="margin-top:50px;">
                    <input type="submit" value="clear cookie" class="btn btn-primary" name="btn-clear-cookie" style="margin-top:50px;">
                </div>
            </form>
        </div>
    </div>
</body>
</html>