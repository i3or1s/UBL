<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ItemLocationQuantityType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_OriginalItemLocationQuantity.html.
 */
final class OriginalItemLocationQuantity extends ItemLocationQuantityType
{
    protected const ELEMENT_SIGNATURE = 'cac:OriginalItemLocationQuantity';
}
