<?php
require_once 'user_own_exceptions.php';
try {
    $user = new User(
        'asd@gmail.com',
        'password',
        'Иван',
        'Иванов'
    );
    echo $user->password;
} catch (Exception $exp) {
    echo "Исключение {$exp->getCode()}: {$exp->getMessage()} <br>";
    echo "в файле {$exp->getFile()} <br>";
    echo "в строке {$exp->getLine()} <br>";
    echo "<pre>";
    echo $exp->getTraceAsString();
    echo "</pre>";
}
finally {
    echo 'Эта строка выводится всегда';
}
