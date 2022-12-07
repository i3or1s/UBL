<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ItemType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Item.html.
 */
final class Item extends ItemType
{
    protected const ELEMENT_SIGNATURE = 'cac:Item';
}
