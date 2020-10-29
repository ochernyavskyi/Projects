<?php

    /*
        1. Разставить всем полям соответствующие аттрибуты для отпарвки формы

        2. Поле Name:
            - проверить на пустоту, если пустое, вывести сообщение под полем 'Name cannot be empty'
            - очистить поле от вредоносных символов

        3. Поле Domain
            - проверить на пустоту, если пустое, вывести сообщение под полем 'Domain cannot be empty'
            - проверить корректен ли домен который вам пришлют, вывести сообщение под полем 'Invalid domain format'

        4. Поле Url
            - проверить если поле было заполнено, то тогда проверить его на корректность, если оно не корректно то выводим под полем 'Invalid url'

        5. Поле Skills
            - очистить от вредоносных символов
            - проверить значение из поля, чтоб присланное значение было больше 5 симвовлов и меньше 100, если значение вышло за переделы
              выведите сообщение под полем 'Must be more than 5 and less 100 symbols' (это можно проверить не при помощи ф-ции фильтра)
    */

    $errors = [];
    // Проверка нажатия кнопки
    if (filter_has_var(INPUT_POST, 'send-btn')) {

        // Валидация email поля
        $email = '';
        if(filter_has_var(INPUT_POST, 'email') && $_POST['email']) {
            if (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) === false) {
                $errors['email'] = 'Invalid email format';
            } else {
                $email = $_POST['email'];
            }
        } else {
            $errors['email'] = 'Email cannot be empty';
        }

        // инструкции для других полей


        if (!$errors) {
            echo 'Email: ' . $email . '<br>';
            // echo 'Domain: ' . $domain . '<br>';
            // остальные поля .....
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>User profile</title>
</head>
<body>
    <div class="container">
        <form method="post" action="/" style="margin-top:50px;">
            <div class="row">
                <div class="col-sm-12">
                    <p class="h1">User profile:</p>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter email">
                        <?php if (array_key_exists('email', $errors)) : ?>
                            <small style="color: red; font-size: 13px;"><?php echo $errors['email']; ?></small>
                        <?php endif;?>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Domain your website</label>
                        <input type="text" class="form-control" placeholder="Enter domain">
                    </div>
                    <div class="form-group">
                        <label>Url to facebook or instagram</label>
                        <input type="text" class="form-control" placeholder="Enter url">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Skills (Comma separated)</label>
                        <input type="text" class="form-control" placeholder="Enter skills.....">
                    </div>
                </div>

                <div class="col-sm-12">
                    <input type="submit" name="send-btn" value="send" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
</body>
</html>