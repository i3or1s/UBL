<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportEquipmentType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ContainedInTransportEquipment.html.
 */
final class ContainedInTransportEquipment extends TransportEquipmentType
{
    protected const ELEMENT_SIGNATURE = 'cac:ContainedInTransportEquipment';
}
