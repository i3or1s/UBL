<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\TimeType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_ActualPickupTime.html.
 */
final class ActualPickupTime extends TimeType
{
    protected const ELEMENT_SIGNATURE = 'cbc:ActualPickupTime';
}
