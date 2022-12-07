<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\StatusType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_CurrentStatus.html.
 */
final class CurrentStatus extends StatusType
{
    protected const ELEMENT_SIGNATURE = 'cac:CurrentStatus';
}
