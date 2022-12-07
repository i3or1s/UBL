<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportHandlingUnitType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PackagedTransportHandlingUnit.html.
 */
final class PackagedTransportHandlingUnit extends TransportHandlingUnitType
{
    protected const ELEMENT_SIGNATURE = 'cac:PackagedTransportHandlingUnit';
}
