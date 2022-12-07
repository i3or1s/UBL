<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PriceListType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PriceList.html.
 */
final class PriceList extends PriceListType
{
    protected const ELEMENT_SIGNATURE = 'cac:PriceList';
}
