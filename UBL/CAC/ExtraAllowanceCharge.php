<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\AllowanceChargeType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ExtraAllowanceCharge.html.
 */
final class ExtraAllowanceCharge extends AllowanceChargeType
{
    protected const ELEMENT_SIGNATURE = 'cac:ExtraAllowanceCharge';
}
