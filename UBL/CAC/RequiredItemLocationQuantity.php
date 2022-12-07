<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ItemLocationQuantityType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_RequiredItemLocationQuantity.html.
 */
final class RequiredItemLocationQuantity extends ItemLocationQuantityType
{
    protected const ELEMENT_SIGNATURE = 'cac:RequiredItemLocationQuantity';
}
