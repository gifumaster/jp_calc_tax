<?php

declare(strict_types=1);

namespace Kudo\Domain\TaxRateRule;

/** 非課税制度 */
class FreeTaxRateRule
{
    /**
     * 非課税の税率を適用する（必ず0.00）
     */
    public function applyRule(): string
    {
        return '0.00';
    }
}