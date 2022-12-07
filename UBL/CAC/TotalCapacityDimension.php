<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DimensionType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TotalCapacityDimension.html.
 */
final class TotalCapacityDimension extends DimensionType
{
    protected const ELEMENT_SIGNATURE = 'cac:TotalCapacityDimension';
}
