<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PriceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Price.html.
 */
final class Price extends PriceType
{
    protected const ELEMENT_SIGNATURE = 'cac:Price';
}
