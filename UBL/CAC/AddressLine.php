<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\Line;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AddressLine.html.
 */
final class AddressLine implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:AddressLine';

    public readonly Line $Line; // [1..1]    An address line expressed as unstructured text.

    public function __construct(Line $Line)
    {
        $this->Line = $Line;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->Line;

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
