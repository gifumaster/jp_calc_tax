<?php

declare(strict_types=1);

namespace Kudo\Domain;

use Carbon\Carbon;

class TaxResult{

    public readonly int $totalAmount;

    public function __construct(
        public readonly TaxRateType $taxRateType,
        public readonly int $totalAmountExcludeTax,
        public readonly int $totalTax,
    ){
        $this->totalAmount = $this->totalAmountExcludeTax + $this->totalTax;
    }
}