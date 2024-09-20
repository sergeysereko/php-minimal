<?php
//Трейты, генераторы, магические методы Почините тест написав код вместо троеточия
//
//    class A {
//    ...
//    }
//
//    assert(
//        "GGGG" ==
//        (new A) . (new A)
//    );

class A{
    public function __toString():string{
        return "GG";
    }
}
assert("GGGG" == (new A).(new A));


//Почините тест написал код вместо троеточия, не используйте __construct()
//
//    class B {
//        private string $b = "gg";
//    ...
//    }
//    assert(
//        "GG" == (new B)->b
//    )


class B {
        private string $b = "gg";

        public function __get($name) {
        return isset($this->b) ? strtoupper($this->b) : "Свойство b не существует";
        }
    }

    assert("GG" == (new B)->b);


//При помощи trait добавьте классам новый метод, почините тесты заменив троеточие на код
trait UpperNameTrait {
      public function upperName():string{
          return strtoupper($this->name);
      }
}

class User {
    use UpperNameTrait;
    public string $name;
    public function __construct(string $name){
        $this->name = $name;
    }
}

class Customer {
    use UpperNameTrait;
    public string $name;
    public function __construct(string $name){
        $this->name = $name;
    }
}


assert((new User('vova'))->upperName() == 'VOVA');

assert((new Customer('vova'))->upperName() == 'VOVA');


//Какая разница между двумя версиями функции getLines,
// какие преимущества и какие ограничения привносит использование генераторов?


//// Версия 1
//    function getLines($file) {
//        $f = fopen($file, 'r');
//        try {
//            while ($line = fgets($f)) {
//                yield $line;
//            }
//        } finally {
//            fclose($f);
//        }
//    }
//// Версия 2
//    function getLines($file) {
//        $f = fopen($file, 'r');
//        try {
//            $result = []
//        while ($line = fgets($f)) {
//            $result[] = $line;
//        }
//    } finally {
//            fclose($f);
//        }
//        return $result;
//    }
//
//foreach (getLines("file.txt") as $n => $line) {
//    ...
//}

// Какая разница? Первый вариант с генератором yield, второй без него
//Преимущества:
// - возвращает значение каждой строки по мере необходимости, не загружая весь файл в память сразу
// - строки читаются из файла по одной за раз, при итерации в foreach
// - файл не загружается полностью в память
// - Повышается производительность

//Ограничения
// - Ограниченный доступ к данным.
// Предоставляют только возможность итерации вперёд (однонаправленный доступ)
// Нельзя "перематывать" назад или случайным образом выбирать элементы.

// - Однократное использование.
// Генератор может быть пройден только один раз.
// После завершения итерации его нельзя повторно использовать для тех же данных.
// Если нужны повторные итерации, файл нужно будет открыть и прочитать снова.

// - Более сложная обработка ошибок
// При использовании генераторов ошибки могут проявляться только на этапе итерации, что делает их отложенными
// и требует более внимательного подхода к обработке исключений.