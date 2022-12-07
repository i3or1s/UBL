<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\AllowanceChargeType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_FreightAllowanceCharge.html.
 */
final class FreightAllowanceCharge extends AllowanceChargeType
{
    protected const ELEMENT_SIGNATURE = 'cac:FreightAllowanceCharge';
}
