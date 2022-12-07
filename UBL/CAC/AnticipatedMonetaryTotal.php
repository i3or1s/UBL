<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\MonetaryTotalType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AnticipatedMonetaryTotal.html.
 */
final class AnticipatedMonetaryTotal extends MonetaryTotalType
{
    protected const ELEMENT_SIGNATURE = 'cac:AnticipatedMonetaryTotal';
}
