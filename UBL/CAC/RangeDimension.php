<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DimensionType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_RangeDimension.html.
 */
final class RangeDimension extends DimensionType
{
    protected const ELEMENT_SIGNATURE = 'cac:RangeDimension';
}
