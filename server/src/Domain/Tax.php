<?php

declare(strict_types=1);

namespace Kudo\Domain;

use Carbon\Carbon;

class Tax {

    public array $itemList;
    private array $result;

    public function __construct(
        private SaleDate $saleDate = new SaleDate(new Carbon())
    )
    {
        $this->itemList = [];
    }

    public function init(){
        $tmp = TaxRateType::cases();
        foreach($tmp as $key){
            $this->result[$key->value] = '0';
        }
    }

    public function add(Item $item){
        $this->itemList[] = $item;
    }

    public function calc(){

        $this->init();

        /* @var $item array<TaxResult> */
        foreach($this->itemList as $item){
            $this->result[$item->taxRateType->value] = bcadd($this->result[$item->taxRateType->value],(string)$item->amountExcludingTax->value);
        }

        //$mul = bcmul((string)$item->amountExcludingTax->value,$item->taxRateType->applyTaxRate($this->saleDate));
        var_dump($this->result);
    }

}