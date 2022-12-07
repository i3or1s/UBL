<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\CCTType\MeasureType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_NetWeightMeasure.html.
 */
final class NetWeightMeasure extends MeasureType
{
    protected const ELEMENT_SIGNATURE = 'cbc:NetWeightMeasure';
}
