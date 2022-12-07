<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\CommodityClassificationType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_AdditionalCommodityClassification.html.
 */
final class AdditionalCommodityClassification extends CommodityClassificationType
{
    protected const ELEMENT_SIGNATURE = 'cac:AdditionalCommodityClassification';
}
