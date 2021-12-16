<?php

declare(strict_types=1);

namespace Kudo\Domain;


use Kudo\Domain\TaxRateRule\FreeTaxRateRule;
use Kudo\Domain\TaxRateRule\ReducedTaxRateRule;
use Kudo\Domain\TaxRateRule\StandardTaxRateRule;

enum TaxRateType:int
{
    case STANDARD_TAX = 1;
    case REDUCED_TAX = 2;
    case TAX_FREE = 3;

    public function name(): string
    {
        return match($this)
        {
            TaxRateType::STANDARD_TAX => '通常税率',
            TaxRateType::REDUCED_TAX => '軽減税率',
            TaxRateType::TAX_FREE => '非課税',
        };
    }

    public function applyTaxRate(SaleDate $saleDate): string
    {
        return match($this)
        {
            TaxRateType::TAX_FREE => (new FreeTaxRateRule())->applyRule(),
            TaxRateType::STANDARD_TAX => (new StandardTaxRateRule($saleDate))->applyRule(),
            TaxRateType::REDUCED_TAX => (new ReducedTaxRateRule($saleDate))->applyRule(),
        };
    }
}
