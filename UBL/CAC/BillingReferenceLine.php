<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\Amount;
use i3or1s\UBL\CBC\ID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_BillingReferenceLine.html.
 */
final class BillingReferenceLine implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:BillingReferenceLine';

    public readonly ID $ID; // [1..1]    An identifier for this transaction line in a billing document.
    public readonly ?Amount $Amount; // [0..1]    The monetary amount of the transaction line, including any allowances and charges but excluding taxes.
    /** @var AllowanceCharge[]|null */
    public readonly ?array $AllowanceCharge; // [0..*]    An allowance or charge applicable to the transaction line.

    /**
     * @param AllowanceCharge[]|null $AllowanceCharge
     */
    public function __construct(ID $ID, ?Amount $Amount, ?array $AllowanceCharge)
    {
        $this->ID = $ID;
        $this->Amount = $Amount;
        $this->AllowanceCharge = $AllowanceCharge;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->Amount) {
            $response[] = (string) $this->Amount;
        }
        if ($this->AllowanceCharge) {
            foreach ($this->AllowanceCharge as $elem) {
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
