<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\DateType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_LatestDeliveryDate.html.
 */
class LatestDeliveryDate extends DateType
{
    protected const ELEMENT_SIGNATURE = 'cbc:LatestDeliveryDate';
}
