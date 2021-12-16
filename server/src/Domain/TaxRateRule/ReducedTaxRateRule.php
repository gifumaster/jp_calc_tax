<?php

declare(strict_types=1);

namespace Kudo\Domain\TaxRateRule;

use Carbon\Carbon;
use Kudo\Domain\SaleDate;

/** 非課税制度 */
class ReducedTaxRateRule
{
    private array $salesTaxes;

    public function __construct(
        private SaleDate $salesDate
    ) {
        $this->salesTaxes = [
            new SalesTax(new Carbon('2019-10-01'), '0.08'),
        ];
    }

    /**
     * @return string 消費税率
     */
    public function applyRule(): string
    {
        $match = array_filter($this->salesTaxes, function($salesTax){
            return $salesTax->getEnforcementDate() <= $this->salesDate->getValue();
        });

        $matchedSalesTax = array_shift($match);

        return $matchedSalesTax?->getTaxRate() ?? '0.00';
    }
}