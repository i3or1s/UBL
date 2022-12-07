<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\LocationType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_FreightChargeLocation.html.
 */
final class FreightChargeLocation extends LocationType
{
    protected const ELEMENT_SIGNATURE = 'cac:FreightChargeLocation';
}
