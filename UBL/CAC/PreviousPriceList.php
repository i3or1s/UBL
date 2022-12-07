<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PriceListType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PreviousPriceList.html.
 */
final class PreviousPriceList extends PriceListType
{
    protected const ELEMENT_SIGNATURE = 'cac:PreviousPriceList';
}
