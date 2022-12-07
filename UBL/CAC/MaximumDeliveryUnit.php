<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DeliveryUnitType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_MaximumDeliveryUnit.html.
 */
final class MaximumDeliveryUnit extends DeliveryUnitType
{
    protected const ELEMENT_SIGNATURE = 'cac:MaximumDeliveryUnit';
}
