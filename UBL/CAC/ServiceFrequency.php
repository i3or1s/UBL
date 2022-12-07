<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ServiceFrequencyType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ServiceFrequency.html.
 */
final class ServiceFrequency extends ServiceFrequencyType
{
    protected const ELEMENT_SIGNATURE = 'cac:ServiceFrequency';
}
