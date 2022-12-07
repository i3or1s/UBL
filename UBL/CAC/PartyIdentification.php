<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;

final class PartyIdentification implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:PartyIdentification';

    public readonly ID $ID;    // [0..1]    An identifier for the party.

    public function __construct(ID $ID)
    {
        $this->ID = $ID;
    }

    public function __toString()
    {
        return sprintf(
            '<%s>%s%s%s</%s>',
            $this::ELEMENT_SIGNATURE,
            PHP_EOL,
            $this->ID,
            PHP_EOL,
            $this::ELEMENT_SIGNATURE,
        );
    }
}
