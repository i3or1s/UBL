<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\DateType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_RequestedDeliveryDate.html.
 */
final class RequestedDeliveryDate extends DateType
{
    protected const ELEMENT_SIGNATURE = 'cbc:RequestedDeliveryDate';
}
