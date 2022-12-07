<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PriceExtensionType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ItemPriceExtension.html.
 */
final class ItemPriceExtension extends PriceExtensionType
{
    protected const ELEMENT_SIGNATURE = 'cac:ItemPriceExtension';
}
