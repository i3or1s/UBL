<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\DateType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_ValidationDate.html.
 */
final class ValidationDate extends DateType
{
    protected const ELEMENT_SIGNATURE = 'cbc:ValidationDate';
}
