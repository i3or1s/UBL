<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\StatusType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Status.html.
 */
final class Status extends StatusType
{
    protected const ELEMENT_SIGNATURE = 'cac:Status';
}
