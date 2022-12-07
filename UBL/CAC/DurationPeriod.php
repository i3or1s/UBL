<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PeriodType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_DurationPeriod.html.
 */
final class DurationPeriod extends PeriodType
{
    protected const ELEMENT_SIGNATURE = 'cac:DurationPeriod';
}
