<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\NumericType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_AirFlowPercent.html.
 */
final class AirFlowPercent extends NumericType
{
    protected const ELEMENT_SIGNATURE = 'cbc:AirFlowPercent';
}
