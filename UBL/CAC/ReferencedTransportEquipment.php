<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportEquipmentType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ReferencedTransportEquipment.html.
 */
final class ReferencedTransportEquipment extends TransportEquipmentType
{
    protected const ELEMENT_SIGNATURE = 'cac:ReferencedTransportEquipment';
}
