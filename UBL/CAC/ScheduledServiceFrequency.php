<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ServiceFrequencyType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ScheduledServiceFrequency.html.
 */
final class ScheduledServiceFrequency extends ServiceFrequencyType
{
    protected const ELEMENT_SIGNATURE = 'cac:ScheduledServiceFrequency';
}
