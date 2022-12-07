<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TemperatureType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Temperature.html.
 */
final class Temperature extends TemperatureType
{
    protected const ELEMENT_SIGNATURE = 'cac:Temperature';
}
