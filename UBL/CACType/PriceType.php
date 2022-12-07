<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AllowanceCharge;
use i3or1s\UBL\CAC\PriceList;
use i3or1s\UBL\CAC\PricingExchangeRate;
use i3or1s\UBL\CAC\ValidityPeriod;
use i3or1s\UBL\CBC\BaseQuantity;
use i3or1s\UBL\CBC\OrderableUnitFactorRate;
use i3or1s\UBL\CBC\PriceAmount;
use i3or1s\UBL\CBC\PriceChangeReason;
use i3or1s\UBL\CBC\PriceTypeCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_PriceType.html.
 */
abstract class PriceType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:PriceType';

    public readonly PriceAmount $PriceAmount; // [1..1]    The amount of the price.
    public readonly ?BaseQuantity $BaseQuantity; // [0..1]    The quantity at which this price applies.
    /** @var PriceChangeReason[]|null */
    public readonly ?array $PriceChangeReason; // [0..*]    A reason for a price change.
    public readonly ?PriceTypeCode $PriceTypeCode; // [0..1]    The type of price, expressed as a code.
    public readonly ?\i3or1s\UBL\CBC\PriceType $PriceType; // [0..1]    The type of price, expressed as text.
    public readonly ?OrderableUnitFactorRate $OrderableUnitFactorRate; // [0..1]    The factor by which the base price unit can be converted to the orderable unit.
    /** @var ValidityPeriod[]|null */
    public readonly ?array $ValidityPeriod; // [0..*]    A period during which this price is valid.
    public readonly ?PriceList $PriceList; // [0..1]    Information about a price list applicable to this price.
    /** @var AllowanceCharge[]|null */
    public readonly ?array $AllowanceCharge; // [0..*]    An allowance or charge associated with this price.
    public readonly ?PricingExchangeRate $PricingExchangeRate; // [0..1]    The exchange rate applicable to this price, if it differs from the exchange rate applicable to the document as a whole.

    /**
     * @param PriceChangeReason[]|null $PriceChangeReason
     * @param ValidityPeriod[]|null    $ValidityPeriod
     * @param AllowanceCharge[]|null   $AllowanceCharge
     */
    public function __construct(PriceAmount $PriceAmount, ?BaseQuantity $BaseQuantity, ?array $PriceChangeReason, ?PriceTypeCode $PriceTypeCode, ?\i3or1s\UBL\CBC\PriceType $PriceType, ?OrderableUnitFactorRate $OrderableUnitFactorRate, ?array $ValidityPeriod, ?PriceList $PriceList, ?array $AllowanceCharge, ?PricingExchangeRate $PricingExchangeRate)
    {
        $this->PriceAmount = $PriceAmount;
        $this->BaseQuantity = $BaseQuantity;
        $this->PriceChangeReason = $PriceChangeReason;
        $this->PriceTypeCode = $PriceTypeCode;
        $this->PriceType = $PriceType;
        $this->OrderableUnitFactorRate = $OrderableUnitFactorRate;
        $this->ValidityPeriod = $ValidityPeriod;
        $this->PriceList = $PriceList;
        $this->AllowanceCharge = $AllowanceCharge;
        $this->PricingExchangeRate = $PricingExchangeRate;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->PriceAmount;
        if ($this->BaseQuantity) {
            $response[] = (string) $this->BaseQuantity;
        }
        if ($this->PriceChangeReason) {
            foreach ($this->PriceChangeReason as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PriceTypeCode) {
            $response[] = (string) $this->PriceTypeCode;
        }
        if ($this->PriceType) {
            $response[] = (string) $this->PriceType;
        }
        if ($this->OrderableUnitFactorRate) {
            $response[] = (string) $this->OrderableUnitFactorRate;
        }
        if ($this->ValidityPeriod) {
            foreach ($this->ValidityPeriod as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PriceList) {
            $response[] = (string) $this->PriceList;
        }
        if ($this->AllowanceCharge) {
            foreach ($this->AllowanceCharge as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PricingExchangeRate) {
            $response[] = (string) $this->PricingExchangeRate;
        }

        return sprintf(
            '<%s>%s%s%s</%s>',
            $this::ELEMENT_SIGNATURE,
            PHP_EOL,
            implode(PHP_EOL, $response),
            PHP_EOL,
            $this::ELEMENT_SIGNATURE,
        );
    }
}
