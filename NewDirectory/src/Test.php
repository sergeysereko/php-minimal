<?php

namespace App\Sergey;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Test
{
    private $loger;

    public function __construct(){
        $this->loger = new Logger('app_loger');
        $this->loger->pushHandler(new StreamHandler('/tmp/mylog.log',Level::Info));
    }

  public function doSomething(){
        $this->loger->info('вызван метод doSomething()');
      echo "Тест что-то делает\n";
  }

}