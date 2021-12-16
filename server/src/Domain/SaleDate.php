<?php

declare(strict_types=1);

namespace Kudo\Domain;

use Carbon\Carbon;

/** 売上日 */
class SaleDate
{
    private Carbon $date;

    /**
     * コンストラクタ
     *
     * @param Carbon $salesDate 売上日
     */
    public function __construct(Carbon $salesDate)
    {
        $this->date = $salesDate->clone();
    }

    public function getValue(): Carbon
    {
        return $this->date->clone();
    }
}