<?php

include 'config.php';
$id = $_GET['id'];

if (filter_has_var(INPUT_GET, 'id')) {
    $query = "DELETE FROM sandbox.products WHERE id=$id";
    $query = $dbh->prepare($query);
    $query->execute();
    header('Location: http://' . $domain);
    exit;

//    после того как все будет работать переадресовать на главную страницу
//    header('Location: http://' . $domain);
//    exit;
}
