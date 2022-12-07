<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\Percent;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_DependentPriceReference.html.
 */
final class DependentPriceReference implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:DependentPriceReference';

    public readonly ?Percent $Percent; // [0..1]    The percentage by which the price of the different item is multiplied to calculate the price of the item.
    public readonly ?LocationAddress $LocationAddress; // [0..1]    The reference location for this dependent price reference.
    public readonly ?DependentLineReference $DependentLineReference; // [0..1]    A reference to a line that the price is depended of.

    public function __construct(?Percent $Percent, ?LocationAddress $LocationAddress, ?DependentLineReference $DependentLineReference)
    {
        $this->Percent = $Percent;
        $this->LocationAddress = $LocationAddress;
        $this->DependentLineReference = $DependentLineReference;
    }

    public function __toString()
    {
        $response = [];
        if ($this->Percent) {
            $response[] = (string) $this->Percent;
        }
        if ($this->LocationAddress) {
            $response[] = (string) $this->LocationAddress;
        }
        if ($this->DependentLineReference) {
            $response[] = (string) $this->DependentLineReference;
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
