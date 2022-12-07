<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportEventType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_EstimatedArrivalTransportEvent.html.
 */
final class EstimatedArrivalTransportEvent extends TransportEventType
{
    protected const ELEMENT_SIGNATURE = 'cac:EstimatedArrivalTransportEvent';
}
