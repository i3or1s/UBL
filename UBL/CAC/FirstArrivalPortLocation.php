<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\LocationType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_FirstArrivalPortLocation.html.
 */
final class FirstArrivalPortLocation extends LocationType
{
    protected const ELEMENT_SIGNATURE = 'cac:FirstArrivalPortLocation';
}
