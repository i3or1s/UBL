<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TemperatureType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_MaximumTemperature.html.
 */
final class MaximumTemperature extends TemperatureType
{
    protected const ELEMENT_SIGNATURE = 'cac:MaximumTemperature';
}
