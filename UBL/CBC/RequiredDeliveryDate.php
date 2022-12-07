<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\DateType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_RequiredDeliveryDate.html.
 */
final class RequiredDeliveryDate extends DateType
{
    protected const ELEMENT_SIGNATURE = 'cbc:RequiredDeliveryDate';
}
