<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DeliveryUnitType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_MinimumDeliveryUnit.html.
 */
final class MinimumDeliveryUnit extends DeliveryUnitType
{
    protected const ELEMENT_SIGNATURE = 'cac:MinimumDeliveryUnit';
}
