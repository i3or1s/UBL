<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\LocationType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PickupLocation.html.
 */
final class PickupLocation extends LocationType
{
    protected const ELEMENT_SIGNATURE = 'cac:PickupLocation';
}
