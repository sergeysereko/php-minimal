<?php
namespace My\Abstract;

abstract class Figure{
    abstract public function getArea():float;
    abstract public function getPerimeter():float;
    public function printInfo(){
        echo "Тип: ".get_class($this);
        echo "\n";
        echo "Площадь: ".$this->getArea();
        echo "\n";
        echo "Периметер: ".$this->getPerimeter();
        echo "\n\n\n";
    }
}
