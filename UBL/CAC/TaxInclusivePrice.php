<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PriceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TaxInclusivePrice.html.
 */
final class TaxInclusivePrice extends PriceType
{
    protected const ELEMENT_SIGNATURE = 'cac:TaxInclusivePrice';
}
