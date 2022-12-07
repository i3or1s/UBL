<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\HazardousItemType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_HazardousItem.html.
 */
final class HazardousItem extends HazardousItemType
{
    protected const ELEMENT_SIGNATURE = 'cac:HazardousItem';
}
