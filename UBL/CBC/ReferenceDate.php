<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\DateType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_ReferenceDate.html.
 */
final class ReferenceDate extends DateType
{
    protected const ELEMENT_SIGNATURE = 'cbc:ReferenceDate';
}
