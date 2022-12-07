<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportationServiceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_OriginalDespatchTransportationService.html.
 */
final class OriginalDespatchTransportationService extends TransportationServiceType
{
    protected const ELEMENT_SIGNATURE = 'cac:OriginalDespatchTransportationService';
}
