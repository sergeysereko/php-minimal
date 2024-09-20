<?php
namespace Calc;
class Minus implements Operation{
    private $a;
    private $b;

    public function __construct(float $a, float $b){
        $this->a = $a;
        $this->b = $b;
    }

    public function calculate(): float{
        return $this->a - $this->b;
    }
}
