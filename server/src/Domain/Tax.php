<?php

declare(strict_types=1);

namespace Kudo\Domain;

use Carbon\Carbon;

class Tax {

    public array $itemList;

    public function __construct(
        private SaleDate $saleDate = new SaleDate(new Carbon())
    )
    {
        $this->itemList = [];
    }

    public function add(Item $item){
        $this->itemList[] = $item;
    }

    public function calc(){

        /* @var $item Item */
        foreach($this->itemList as $item){
            $result = $item->taxRateType->applyTaxRate($this->saleDate);
        }
    }

}