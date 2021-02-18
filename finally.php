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
    $outStr = "Исключение {$exp->getCode()}: {$exp->getMessage()} \n"
        . "в файле {$exp->getFile()} \n"
        . "в строке {$exp->getLine()} \n"
        . $exp->getTraceAsString()
        ."\n\n";
    file_put_contents("exceptions.log", $outStr, FILE_APPEND);
}
finally {
    echo 'Эта строка выводится всегда';
}
