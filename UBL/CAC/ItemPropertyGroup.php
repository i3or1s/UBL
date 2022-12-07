<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\ImportanceCode;
use i3or1s\UBL\CBC\Name;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ItemPropertyGroup.html.
 */
final class ItemPropertyGroup implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:ItemPropertyGroup';

    public readonly ID $ID; // [1..1]    An identifier for this group of item properties.
    public readonly ?Name $Name; // [0..1]   The name of this item property group.
    public readonly ?ImportanceCode $ImportanceCode; // [0..1]    A code signifying the importance of this property group in using it to describe a required Item.

    public function __construct(ID $ID, ?Name $Name, ?ImportanceCode $ImportanceCode)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->ImportanceCode = $ImportanceCode;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->Name) {
            $response[] = (string) $this->Name;
        }
        if ($this->ImportanceCode) {
            $response[] = (string) $this->ImportanceCode;
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
