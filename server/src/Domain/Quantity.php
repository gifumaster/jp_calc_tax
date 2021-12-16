<?php

namespace Kudo\Domain;

use Kudo\Exceptions\OutOfRangeException;

class Quantity{

    public function __construct(
        public readonly int $value
    )
    {
        if($value < 0){
            throw new OutOfRangeException('個数');
        }
    }


}