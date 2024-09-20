<?php


//Создать класс исключения MyException и отдельную функцию mythrow которая бросает исключение класса MyException.
namespace MyException;

use Exception;

class MyException extends Exception {
    public function __construct($message = "", $code = 0, Exception $previos = null)
    {
        parent::__construct($message,$code,$previos);
    }
}


function mythrow($message){
    throw new MyException($message);
}
// Закоментировал реализацию первого задания
/*try {
    mythrow("Это сообщение об ошибке.");
} catch (MyException $e) {
    echo "Поймано исключение: " . $e->getMessage() . "\n";
}
*/

//Написать код, который перехватывает все исключения брошенные функцией mythrow и выводит
// при спойманном исключении текст 'exception', иначе выводит 'passed'

try {
    mythrow("Это сообщение об ошибке.");
} catch (MyException $e) {
    echo 'exception';
    echo "<br>";
} finally {
    echo 'passed';
}

//Написать функцию customthrow(int $i) которая бросает исключение \Exception если $i меньше 6.
// Написать свою реализацию функции  assertException(стандартными средствами языка php),
// которая будет проверять что вызывается нужное исключение. Вызов функции может выглядеть так:
//assertException(
//    \Exception::class,
//    function() {
//        customthrow(2);
//    }
//);

function customthrow(int $i) {
    if ($i < 6) {
        throw new \Exception("Значение меньше 6");
    }
    else{
        throw new \RuntimeException("Значение меньше 6, выбрасывается RuntimeException");
    }
}


function assertException(string $expectedException, callable $callback){
    try {
        $callback(); // Выполняем переданный callback
        echo "<br>";
        echo "Исключение не выбрано.\n";
    } catch (\Exception $e) {
        if (get_class($e) === $expectedException) {
            echo "<br>";
            echo "Обнаружено ожидаемое исключение типа " . $expectedException . ".\n";
        } else {
            echo "<br>";
            echo "Обнаружено неожиданное исключение типа " . get_class($e) . ".\n";
        }
    }
}


assertException(
    \Exception::class,
    function() {
        customthrow(7);
    }
);