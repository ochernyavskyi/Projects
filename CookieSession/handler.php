<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Ссылка на главную страницу сайта, заменить на свою
$url = 'http://localhost/index.php';


// 1. Реализовать счетчик инкремента, дикременета, а также его сброс при помощи сессии
if (isset($_POST['btn-increment'])) {
    if (!array_key_exists('count', $_SESSION)) {
        $_SESSION['count'] = 1;
    } else {
        $_SESSION['count']++;
    }
    // увеличиваем на +1
}

if (filter_has_var(INPUT_POST, 'btn-decrement')) {
    if (!array_key_exists('count', $_SESSION)) {
        $_SESSION['count'] = -1;
    } else {
        $_SESSION['count']--;
    }
    // уменьшаем на -1
}

if (array_key_exists('btn-clear-counter', $_POST)) {
    // очищаем значение счетчика
    session_destroy();
}


// 2. Реализуйте по примеру сохранение выбранных настроек в куки. Время жизни куки увеличте до 1 минуты
if (filter_has_var(INPUT_POST, 'save-btn')) {

    // Пример для нотификаций
    if (filter_has_var(INPUT_POST, 'allowNotifications') && $_POST['allowNotifications'] == 'on') {
        setcookie('settings[notifications]', 'on', time() + 60);
    }

    if (filter_has_var(INPUT_POST, 'showInformation') && $_POST['showInformation'] == 'on') {
        setcookie('settings[information]', 'on', time() + 60);
        // другие чекбоксы
    }
    if (filter_has_var(INPUT_POST, 'hidePhone') && $_POST['hidePhone'] == 'on') {
        setcookie('settings[phoneVisible]', 'on', time() + 60);
    }
}

// 3. Реализуйте кнопку очистки cookie
if (isset($_POST['btn-clear-cookie'])) {
    setcookie('settings[notifications]', '', time() - 100);
    setcookie('settings[information]', '', time() - 100);
    setcookie('settings[phoneVisible]', '', time() - 100);
}

header('Location: ' . $url);
exit;