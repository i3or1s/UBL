<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\LocaleCode;
use i3or1s\UBL\CBC\Name;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Language.html.
 */
final class Language implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:Language';

    public readonly ?ID $ID; // [0..1]    An identifier for this language.
    public readonly ?Name $Name; // [0..1]    The name of this language.
    public readonly ?LocaleCode $LocaleCode; // [0..1]    A code signifying the locale in which this language is used.

    public function __construct(?ID $ID, ?Name $Name, ?LocaleCode $LocaleCode)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->LocaleCode = $LocaleCode;
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
        if ($this->LocaleCode) {
            $response[] = (string) $this->LocaleCode;
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
