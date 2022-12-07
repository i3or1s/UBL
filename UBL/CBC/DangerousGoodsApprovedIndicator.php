<?php

namespace i3or1s\UBL\CBC;

use i3or1s\UBL\UDTType\IndicatorType;

/**
 * http://www.datypic.com/sc/ubl21/e-cbc_DangerousGoodsApprovedIndicator.html.
 */
final class DangerousGoodsApprovedIndicator extends IndicatorType
{
    protected const ELEMENT_SIGNATURE = 'cbc:DangerousGoodsApprovedIndicator';
}
