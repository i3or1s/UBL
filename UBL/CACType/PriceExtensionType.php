<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\TaxTotal;
use i3or1s\UBL\CBC\Amount;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_PriceExtensionType.html.
 */
abstract class PriceExtensionType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:PriceExtensionType';

    public readonly Amount $Amount; // [1..1]    The amount of this price extension.
    /** @var TaxTotal[]|null */
    public readonly ?array $TaxTotal; // [0..*]    A total amount of taxes of a particular kind applicable to this price extension.

    /**
     * @param TaxTotal[]|null $TaxTotal
     */
    public function __construct(Amount $Amount, ?array $TaxTotal)
    {
        $this->Amount = $Amount;
        $this->TaxTotal = $TaxTotal;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->Amount;
        if ($this->TaxTotal) {
            foreach ($this->TaxTotal as $elem) {
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
