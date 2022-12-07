<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PickupType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Pickup.html.
 */
final class Pickup extends PickupType
{
    protected const ELEMENT_SIGNATURE = 'cac:Pickup';
}
