<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DimensionType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_MeasurementDimension.html.
 */
final class MeasurementDimension extends DimensionType
{
    protected const ELEMENT_SIGNATURE = 'cac:MeasurementDimension';
}
