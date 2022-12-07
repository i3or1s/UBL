<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\DateType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_AvailabilityDate.html.
 */
final class AvailabilityDate extends DateType
{
    protected const ELEMENT_SIGNATURE = 'cbc:AvailabilityDate';
}
