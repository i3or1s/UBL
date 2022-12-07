<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\TaxSubtotal;
use i3or1s\UBL\CBC\RoundingAmount;
use i3or1s\UBL\CBC\TaxAmount;
use i3or1s\UBL\CBC\TaxEvidenceIndicator;
use i3or1s\UBL\CBC\TaxIncludedIndicator;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_TaxTotalType.html.
 */
abstract class TaxTotalType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:TaxTotalType';

    public readonly TaxAmount $TaxAmount; // [1..1]    The total tax amount for a particular taxation scheme, e.g., VAT; the sum of the tax subtotals for each tax category within the taxation scheme.
    public readonly ?RoundingAmount $RoundingAmount; // [0..1]    The rounding amount (positive or negative) added to the calculated tax total to produce the rounded TaxAmount.
    public readonly ?TaxEvidenceIndicator $TaxEvidenceIndicator; // [0..1]    An indicator that this total is recognized as legal evidence for taxation purposes (true) or not (false).
    public readonly ?TaxIncludedIndicator $TaxIncludedIndicator; // [0..1]    An indicator that tax is included in the calculation (true) or not (false).
    /** @var TaxSubtotal[]|null */
    public readonly ?array $TaxSubtotal; // [0..*]    One of the subtotals the sum of which equals the total tax amount for a particular taxation scheme.

    /**
     * @param TaxSubtotal[]|null $TaxSubtotal
     */
    public function __construct(TaxAmount $TaxAmount, ?RoundingAmount $RoundingAmount, ?TaxEvidenceIndicator $TaxEvidenceIndicator, ?TaxIncludedIndicator $TaxIncludedIndicator, ?array $TaxSubtotal)
    {
        $this->TaxAmount = $TaxAmount;
        $this->RoundingAmount = $RoundingAmount;
        $this->TaxEvidenceIndicator = $TaxEvidenceIndicator;
        $this->TaxIncludedIndicator = $TaxIncludedIndicator;
        $this->TaxSubtotal = $TaxSubtotal;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->TaxAmount;
        if ($this->RoundingAmount) {
            $response[] = (string) $this->RoundingAmount;
        }
        if ($this->TaxEvidenceIndicator) {
            $response[] = (string) $this->TaxEvidenceIndicator;
        }
        if ($this->TaxIncludedIndicator) {
            $response[] = (string) $this->TaxIncludedIndicator;
        }
        if ($this->TaxSubtotal) {
            foreach ($this->TaxSubtotal as $elem) {
                $response[] = (string) $elem;
            }
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
