<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ItemLocationQuantityType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_OfferedItemLocationQuantity.html.
 */
final class OfferedItemLocationQuantity extends ItemLocationQuantityType
{
    protected const ELEMENT_SIGNATURE = 'cac:OfferedItemLocationQuantity';
}
