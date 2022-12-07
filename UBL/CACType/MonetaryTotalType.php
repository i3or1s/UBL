<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CBC\AllowanceTotalAmount;
use i3or1s\UBL\CBC\ChargeTotalAmount;
use i3or1s\UBL\CBC\LineExtensionAmount;
use i3or1s\UBL\CBC\PayableAlternativeAmount;
use i3or1s\UBL\CBC\PayableAmount;
use i3or1s\UBL\CBC\PayableRoundingAmount;
use i3or1s\UBL\CBC\PrepaidAmount;
use i3or1s\UBL\CBC\TaxExclusiveAmount;
use i3or1s\UBL\CBC\TaxInclusiveAmount;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_MonetaryTotalType.html.
 */
abstract class MonetaryTotalType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:MonetaryTotalType';

    public readonly ?LineExtensionAmount $LineExtensionAmount; // [0..1]    The monetary amount of an extended transaction line, net of tax and settlement discounts, but inclusive of any applicable rounding amount.
    public readonly ?TaxExclusiveAmount $TaxExclusiveAmount; // [0..1]    The monetary amount of an extended transaction line, exclusive of taxes.
    public readonly ?TaxInclusiveAmount $TaxInclusiveAmount; // [0..1]    The monetary amount including taxes; the sum of payable amount and prepaid amount.
    public readonly ?AllowanceTotalAmount $AllowanceTotalAmount; // [0..1]    The total monetary amount of all allowances.
    public readonly ?ChargeTotalAmount $ChargeTotalAmount; // [0..1]    The total monetary amount of all charges.
    public readonly ?PrepaidAmount $PrepaidAmount; // [0..1]    The total prepaid monetary amount.
    public readonly ?PayableRoundingAmount $PayableRoundingAmount; // [0..1]    The rounding amount (positive or negative) added to produce the line extension amount.
    public readonly PayableAmount $PayableAmount; // [1..1]    The amount of the monetary total to be paid.
    public readonly ?PayableAlternativeAmount $PayableAlternativeAmount; // [0..1]    The amount of the monetary total to be paid, expressed in an alternative currency.

    public function __construct(?LineExtensionAmount $LineExtensionAmount, ?TaxExclusiveAmount $TaxExclusiveAmount, ?TaxInclusiveAmount $TaxInclusiveAmount, ?AllowanceTotalAmount $AllowanceTotalAmount, ?ChargeTotalAmount $ChargeTotalAmount, ?PrepaidAmount $PrepaidAmount, ?PayableRoundingAmount $PayableRoundingAmount, PayableAmount $PayableAmount, ?PayableAlternativeAmount $PayableAlternativeAmount)
    {
        $this->LineExtensionAmount = $LineExtensionAmount;
        $this->TaxExclusiveAmount = $TaxExclusiveAmount;
        $this->TaxInclusiveAmount = $TaxInclusiveAmount;
        $this->AllowanceTotalAmount = $AllowanceTotalAmount;
        $this->ChargeTotalAmount = $ChargeTotalAmount;
        $this->PrepaidAmount = $PrepaidAmount;
        $this->PayableRoundingAmount = $PayableRoundingAmount;
        $this->PayableAmount = $PayableAmount;
        $this->PayableAlternativeAmount = $PayableAlternativeAmount;
    }

    public function __toString()
    {
        $response = [];
        if ($this->LineExtensionAmount) {
            $response[] = (string) $this->LineExtensionAmount;
        }
        if ($this->TaxExclusiveAmount) {
            $response[] = (string) $this->TaxExclusiveAmount;
        }
        if ($this->TaxInclusiveAmount) {
            $response[] = (string) $this->TaxInclusiveAmount;
        }
        if ($this->AllowanceTotalAmount) {
            $response[] = (string) $this->AllowanceTotalAmount;
        }
        if ($this->ChargeTotalAmount) {
            $response[] = (string) $this->ChargeTotalAmount;
        }
        if ($this->PrepaidAmount) {
            $response[] = (string) $this->PrepaidAmount;
        }
        if ($this->PayableRoundingAmount) {
            $response[] = (string) $this->PayableRoundingAmount;
        }
        $response[] = (string) $this->PayableAmount;
        if ($this->PayableAlternativeAmount) {
            $response[] = (string) $this->PayableAlternativeAmount;
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
