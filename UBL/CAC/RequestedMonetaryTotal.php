<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\MonetaryTotalType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_RequestedMonetaryTotal.html.
 */
final class RequestedMonetaryTotal extends MonetaryTotalType
{
    protected const ELEMENT_SIGNATURE = 'cac:RequestedMonetaryTotal';
}
