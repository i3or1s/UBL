<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\CommodityClassificationType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_UnsupportedCommodityClassification.html.
 */
final class UnsupportedCommodityClassification extends CommodityClassificationType
{
    protected const ELEMENT_SIGNATURE = 'cac:UnsupportedCommodityClassification';
}
