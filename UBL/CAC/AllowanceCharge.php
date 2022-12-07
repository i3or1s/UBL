<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\AllowanceChargeType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AllowanceCharge.html.
 */
final class AllowanceCharge extends AllowanceChargeType
{
    protected const ELEMENT_SIGNATURE = 'cac:AllowanceCharge';
}
