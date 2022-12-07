<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ShipmentType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ConsolidatedShipment.html.
 */
final class ConsolidatedShipment extends ShipmentType
{
    protected const ELEMENT_SIGNATURE = 'cac:ConsolidatedShipment';
}
