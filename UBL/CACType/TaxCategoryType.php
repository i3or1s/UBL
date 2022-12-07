<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\TaxScheme;
use i3or1s\UBL\CBC\BaseUnitMeasure;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Name;
use i3or1s\UBL\CBC\Percent;
use i3or1s\UBL\CBC\PerUnitAmount;
use i3or1s\UBL\CBC\TaxExemptionReason;
use i3or1s\UBL\CBC\TaxExemptionReasonCode;
use i3or1s\UBL\CBC\TierRange;
use i3or1s\UBL\CBC\TierRatePercent;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_TaxCategoryType.html.
 */
abstract class TaxCategoryType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:TaxCategoryType';

    public readonly ?ID $ID; // [0..1]    An identifier for this tax category.
    public readonly ?Name $Name; // [0..1]    The name of this tax category.
    public readonly ?Percent $Percent; // [0..1]    The tax rate for this category, expressed as a percentage.
    public readonly ?BaseUnitMeasure $BaseUnitMeasure; // [0..1]    A Unit of Measures used as the basic for the tax calculation applied at a certain rate per unit.
    public readonly ?PerUnitAmount $PerUnitAmount; // [0..1]    Where a tax is applied at a certain rate per unit, the rate per unit applied.
    public readonly ?TaxExemptionReasonCode $TaxExemptionReasonCode; // [0..1]    The reason for tax being exempted, expressed as a code.
    /** @var TaxExemptionReason[]|null */
    public readonly ?array $TaxExemptionReason; // [0..*]    The reason for tax being exempted, expressed as text.
    public readonly ?TierRange $TierRange; // [0..1]    Where a tax is tiered, the range of taxable amounts that determines the rate of tax applicable to this tax category.
    public readonly ?TierRatePercent $TierRatePercent; // [0..1]    Where a tax is tiered, the tax rate that applies within the specified range of taxable amounts for this tax category.
    public readonly ?TaxScheme $TaxScheme; // [1..1]    The taxation scheme within which this tax category is defined.

    /**
     * @param TaxExemptionReason[]|null $TaxExemptionReason
     */
    public function __construct(?ID $ID, ?Name $Name, ?Percent $Percent, ?BaseUnitMeasure $BaseUnitMeasure, ?PerUnitAmount $PerUnitAmount, ?TaxExemptionReasonCode $TaxExemptionReasonCode, ?array $TaxExemptionReason, ?TierRange $TierRange, ?TierRatePercent $TierRatePercent, ?TaxScheme $TaxScheme)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Percent = $Percent;
        $this->BaseUnitMeasure = $BaseUnitMeasure;
        $this->PerUnitAmount = $PerUnitAmount;
        $this->TaxExemptionReasonCode = $TaxExemptionReasonCode;
        $this->TaxExemptionReason = $TaxExemptionReason;
        $this->TierRange = $TierRange;
        $this->TierRatePercent = $TierRatePercent;
        $this->TaxScheme = $TaxScheme;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->Name) {
            $response[] = (string) $this->Name;
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
        if ($this->TaxExemptionReasonCode) {
            $response[] = (string) $this->TaxExemptionReasonCode;
        }
        if ($this->TaxExemptionReason) {
            foreach ($this->TaxExemptionReason as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TierRange) {
            $response[] = (string) $this->TierRange;
        }
        if ($this->TierRatePercent) {
            $response[] = (string) $this->TierRatePercent;
        }
        if ($this->TaxScheme) {
            $response[] = (string) $this->TaxScheme;
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
