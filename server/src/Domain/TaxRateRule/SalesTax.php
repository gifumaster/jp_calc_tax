<?php

declare(strict_types=1);

namespace Kudo\Domain\TaxRateRule;

use Kudo\Exceptions\OutOfRangeException;
use Carbon\Carbon;

/** 消費税 */
class SalesTax
{
    private Carbon $enforcementDate;

    /**
     * コンストラクタ
     *
     * @param Carbon $enforcementDate 執行日
     * @param string $taxRate         税率
     */
    public function __construct(
        Carbon $enforcementDate,
        private string $taxRate
    ) {
        $this->enforcementDate = $enforcementDate->clone();

        if (!$this->isValidTaxRate($taxRate)) {
            throw new OutOfRangeException('税率');
        }
    }

    public function getEnforcementDate(): Carbon
    {
        return $this->enforcementDate->clone();
    }

    public function getTaxRate(): string
    {
        return $this->taxRate;
    }

    /**
     * 税率が有効な値であるか
     *
     * @param string $taxRate 税率
     *
     * @return bool 有効ならTrue
     */
    private function isValidTaxRate(string $taxRate): bool
    {
        return \in_array(bccomp($taxRate, '0', 2), [0, 1], true);
    }
}