<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\GoodsItemType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_GoodsItem.html.
 */
final class GoodsItem extends GoodsItemType
{
    protected const ELEMENT_SIGNATURE = 'cac:GoodsItem';
}
