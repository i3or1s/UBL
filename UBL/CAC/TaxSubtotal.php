<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\BaseUnitMeasure;
use i3or1s\UBL\CBC\CalculationSequenceNumeric;
use i3or1s\UBL\CBC\Percent;
use i3or1s\UBL\CBC\PerUnitAmount;
use i3or1s\UBL\CBC\TaxableAmount;
use i3or1s\UBL\CBC\TaxAmount;
use i3or1s\UBL\CBC\TierRange;
use i3or1s\UBL\CBC\TierRatePercent;
use i3or1s\UBL\CBC\TransactionCurrencyTaxAmount;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TaxSubtotal.html.
 */
final class TaxSubtotal implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:TaxSubtotal';

    public readonly ?TaxableAmount $TaxableAmount; // [0..1]    The net amount to which the tax percent (rate) is applied to calculate the tax amount.
    public readonly TaxAmount $TaxAmount; // [1..1]    The amount of this tax subtotal.
    public readonly ?CalculationSequenceNumeric $CalculationSequenceNumeric; // [0..1]    The number of this tax subtotal in the sequence of subtotals corresponding to the order in which multiple taxes are applied. If all taxes are applied to the same taxable amount (i.e., their order of application is inconsequential), then CalculationSequenceNumeric is 1 for all tax subtotals applied to a given amount.
    public readonly ?TransactionCurrencyTaxAmount $TransactionCurrencyTaxAmount; // [0..1]    The amount of this tax subtotal, expressed in the currency used for invoicing.
    public readonly ?Percent $Percent; // [0..1]    The tax rate of the tax category applied to this tax subtotal, expressed as a percentage.
    public readonly ?BaseUnitMeasure $BaseUnitMeasure; // [0..1]    The unit of measure on which the tax calculation is based
    public readonly ?PerUnitAmount $PerUnitAmount; // [0..1]    Where a tax is applied at a certain rate per unit, the rate per unit applied.
    public readonly ?TierRange $TierRange; // [0..1]    Where a tax is tiered, the range of taxable amounts that determines the rate of tax applicable to this tax subtotal.
    public readonly ?TierRatePercent $TierRatePercent; // [0..1]    Where a tax is tiered, the tax rate that applies within a specified range of taxable amounts for this tax subtotal.
    public readonly TaxCategory $TaxCategory; // [1..1]    The tax category applicable to this subtotal.

    public function __construct(TaxCategory $TaxCategory, TaxAmount $TaxAmount, ?TaxableAmount $TaxableAmount, ?CalculationSequenceNumeric $CalculationSequenceNumeric, ?TransactionCurrencyTaxAmount $TransactionCurrencyTaxAmount, ?Percent $Percent, ?BaseUnitMeasure $BaseUnitMeasure, ?PerUnitAmount $PerUnitAmount, ?TierRange $TierRange, ?TierRatePercent $TierRatePercent)
    {
        $this->TaxCategory = $TaxCategory;
        $this->TaxAmount = $TaxAmount;
        $this->TaxableAmount = $TaxableAmount;
        $this->CalculationSequenceNumeric = $CalculationSequenceNumeric;
        $this->TransactionCurrencyTaxAmount = $TransactionCurrencyTaxAmount;
        $this->Percent = $Percent;
        $this->BaseUnitMeasure = $BaseUnitMeasure;
        $this->PerUnitAmount = $PerUnitAmount;
        $this->TierRange = $TierRange;
        $this->TierRatePercent = $TierRatePercent;
    }

    public function __toString()
    {
        $response = [];
        if ($this->TaxableAmount) {
            $response[] = (string) $this->TaxableAmount;
        }
        $response[] = (string) $this->TaxAmount;
        if ($this->CalculationSequenceNumeric) {
            $response[] = (string) $this->CalculationSequenceNumeric;
        }
        if ($this->TransactionCurrencyTaxAmount) {
            $response[] = (string) $this->TransactionCurrencyTaxAmount;
        }
        if ($this->Percent) {
            $response[] = (string) $this->Percent;
        }
        if ($this->BaseUnitMeasure) {
            $response[] = (string) $this->BaseUnitMeasure;
        }
        if ($this->PerUnitAmount) {
            $response[] = (string) $this->PerUnitAmount;
        }
        if ($this->TierRange) {
            $response[] = (string) $this->TierRange;
        }
        if ($this->TierRatePercent) {
            $response[] = (string) $this->TierRatePercent;
        }
        $response[] = (string) $this->TaxCategory;

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
