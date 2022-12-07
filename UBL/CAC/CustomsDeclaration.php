<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_CustomsDeclaration.html.
 */
final class CustomsDeclaration implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:CustomsDeclaration';

    public readonly ID $ID; // [1..1]    An identifier associated with customs related procedures.
    public readonly ?IssuerParty $IssuerParty; // [0..1]    Describes the party issuing the customs declaration.

    public function __construct(ID $ID, ?IssuerParty $IssuerParty)
    {
        $this->ID = $ID;
        $this->IssuerParty = $IssuerParty;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->IssuerParty) {
            $response[] = (string) $this->IssuerParty;
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
