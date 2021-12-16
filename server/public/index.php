<?php
require_once "../vendor/autoload.php";

use Carbon\Carbon;
use Kudo\Domain\Item;
use Kudo\Domain\SaleDate;
use Kudo\Domain\Tax;
use Kudo\Domain\AmountExcludingTax;
use Kudo\Domain\Quantity;
use Kudo\Domain\TaxRateType;

$saleDate = new SaleDate(new Carbon('2020-01-01'));
$tax = new Tax($saleDate);


$item = new Item(new AmountExcludingTax('10000'),new Quantity(1),TaxRateType::STANDARD_TAX);
$tax->add($item);

$item = new Item(new AmountExcludingTax('10000'),new Quantity(2),TaxRateType::REDUCED_TAX);
$tax->add($item);

$item = new Item(new AmountExcludingTax('10000'),new Quantity(3),TaxRateType::TAX_FREE);
$tax->add($item);

$item = new Item(new AmountExcludingTax('123'),new Quantity(1),TaxRateType::STANDARD_TAX);
$tax->add($item);

$tax->calc();