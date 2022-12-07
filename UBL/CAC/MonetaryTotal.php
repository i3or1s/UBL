<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\MonetaryTotalType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_MonetaryTotal.html.
 */
final class MonetaryTotal extends MonetaryTotalType
{
    protected const ELEMENT_SIGNATURE = 'cac:MonetaryTotal';
}
