<?php
//Работа с стандартной библиотекой(SPL)
//
//При помощи класса RecursiveDirectoryIterator выведите список только файлов,
// которые находятся в вашей домашней директории включая все поддиректории

$directory = getenv('HOME');

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS)
);

foreach ($iterator as $fileInfo) {
    if ($fileInfo->isFile()) {
        echo $fileInfo->getPathname() . PHP_EOL;
    }
}

//Зачем нужен класс исключений InvalidArgumentException и какие еще классы исключений из SPL вы знаете?

//InvalidArgumentException- используетяс для обработки ситуаций, когда аргумент, переданный функции
//или методу, имеет недопустимое значение или тип.
//Зачем нужен
//- помогает понять, что проблема связана именно с аргументом, переданным в функцию
//- облегчает отладку и тестирование.

//Другие классы исключений:
//- LogicException - базовый класс для логических ошибок
//- BadMethodCallException: Выбрасывается, если вызывается метод, который не реализован или недоступен
//- DomainException: Выбрасывается, если аргумент находится вне допустимого домена значений.
//- LengthException: Выбрасывается, если переданный аргумент имеNет недопустимую длину.
//- OutOfRangeException: Выбрасывается, если значение выходит за допустимые пределы.

//- RuntimeException: Базовый класс для ошибок, возникающих во время выполнения программы.
//- OutOfBoundsException: Выбрасывается, если доступ к элементу массива осуществляется за его пределами.
//- OverflowException: Выбрасывается при переполнении, например, при добавлении элемента в переполненную структуру данных.
//- UnderflowException: Выбрасывается при извлечении элемента из пустой структуры данных.
//- UnexpectedValueException: Выбрасывается, если метод получает значение, которого он не ожидал.