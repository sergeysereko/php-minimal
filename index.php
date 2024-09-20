<?php

// Автолоадер
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/classes/' . $class_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Файл для класса $class_name не найден: $file\n";
    }
});


$test1 = new Test1();
$test1->do();

$test2 = new Test2();
$test2->do();

