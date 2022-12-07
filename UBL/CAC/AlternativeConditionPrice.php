<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PriceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AlternativeConditionPrice.html.
 */
final class AlternativeConditionPrice extends PriceType
{
    protected const ELEMENT_SIGNATURE = 'cac:AlternativeConditionPrice';
}
