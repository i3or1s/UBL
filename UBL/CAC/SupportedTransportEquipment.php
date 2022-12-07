<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportEquipmentType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_SupportedTransportEquipment.html.
 */
final class SupportedTransportEquipment extends TransportEquipmentType
{
    protected const ELEMENT_SIGNATURE = 'cac:SupportedTransportEquipment';
}
