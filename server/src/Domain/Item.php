<?php

namespace Kudo\Domain;

class item{

    public function __construct(
        public readonly AmountExcludingTax $amountExcludingTax,
        public readonly Quantity $quantity,
        public readonly TaxRateType $taxRateType,
    )
    {

    }

}