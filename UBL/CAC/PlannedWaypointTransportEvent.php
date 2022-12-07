<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\TransportEventType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PlannedWaypointTransportEvent.html.
 */
final class PlannedWaypointTransportEvent extends TransportEventType
{
    protected const ELEMENT_SIGNATURE = 'cac:PlannedWaypointTransportEvent';
}
