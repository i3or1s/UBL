<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PeriodType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ServiceStartTimePeriod.html.
 */
final class ServiceStartTimePeriod extends PeriodType
{
    protected const ELEMENT_SIGNATURE = 'cac:ServiceStartTimePeriod';
}