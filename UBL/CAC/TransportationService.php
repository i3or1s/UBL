<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportationServiceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TransportationService.html.
 */
final class TransportationService extends TransportationServiceType
{
    protected const ELEMENT_SIGNATURE = 'cac:TransportationService';
}
