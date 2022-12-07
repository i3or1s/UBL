<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportationServiceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AdditionalTransportationService.html.
 */
final class AdditionalTransportationService extends TransportationServiceType
{
    protected const ELEMENT_SIGNATURE = 'cac:AdditionalTransportationService';
}
