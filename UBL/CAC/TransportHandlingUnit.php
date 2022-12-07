<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportHandlingUnitType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TransportHandlingUnit.html.
 */
final class TransportHandlingUnit extends TransportHandlingUnitType
{
    protected const ELEMENT_SIGNATURE = 'cac:TransportHandlingUnit';
}
