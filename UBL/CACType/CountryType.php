<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CBC\IdentificationCode;
use i3or1s\UBL\CBC\Name;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_CountryType.html.
 */
abstract class CountryType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:CountryType';

    public readonly ?IdentificationCode $IdentificationCode;    // [0..1]    A code signifying this country.
    public readonly ?Name $Name;    // [0..1]    The name of this country.

    public function __construct(?IdentificationCode $IdentificationCode, ?Name $Name)
    {
        $this->IdentificationCode = $IdentificationCode;
        $this->Name = $Name;
    }

    public function __toString()
    {
        $response = [];
        if ($this->IdentificationCode) {
            $response[] = (string) $this->IdentificationCode;
        }
        if ($this->Name) {
            $response[] = (string) $this->Name;
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
