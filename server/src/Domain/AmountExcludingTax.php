<?php

namespace Kudo\Domain;

use Kudo\Exceptions\OutOfRangeException;

class AmountExcludingTax{

    public function __construct(
        public readonly int $value
    )
    {
        if($value < 0){
            throw new OutOfRangeException('税抜き金額');
        }
    }


}