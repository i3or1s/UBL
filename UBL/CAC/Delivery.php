<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DeliveryType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Delivery.html.
 */
final class Delivery extends DeliveryType
{
    protected const ELEMENT_SIGNATURE = 'cac:Delivery';
}
