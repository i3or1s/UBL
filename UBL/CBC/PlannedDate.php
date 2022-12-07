<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\DateType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_PlannedDate.html.
 */
final class PlannedDate extends DateType
{
    protected const ELEMENT_SIGNATURE = 'cbc:PlannedDate';
}
