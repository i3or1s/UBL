<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\TimeType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_StartTime.html.
 */
final class StartTime extends TimeType
{
    protected const ELEMENT_SIGNATURE = 'cbc:StartTime';
}
