<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\Name;

final class PartyName implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:PartyName';

    public readonly Name $Name;    // [0..1]    An identifier for the party.

    public function __construct(Name $Name)
    {
        $this->Name = $Name;
    }

    public function __toString()
    {
        return sprintf(
            '<%s>%s%s%s</%s>',
            $this::ELEMENT_SIGNATURE,
            PHP_EOL,
            $this->Name,
            PHP_EOL,
            $this::ELEMENT_SIGNATURE,
        );
    }
}
