<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\TimeType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_ExpiryTime.html.
 */
final class ExpiryTime extends TimeType
{
    protected const ELEMENT_SIGNATURE = 'cbc:ExpiryTime';
}
