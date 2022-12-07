<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\LocationType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Location.html.
 */
final class Location extends LocationType
{
    protected const ELEMENT_SIGNATURE = 'cac:Location';
}
