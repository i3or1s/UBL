<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\AllowanceChargeType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ServiceAllowanceCharge.html.
 */
final class ServiceAllowanceCharge extends AllowanceChargeType
{
    protected const ELEMENT_SIGNATURE = 'cac:ServiceAllowanceCharge';
}
