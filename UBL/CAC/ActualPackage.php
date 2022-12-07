<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PackageType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ActualPackage.html.
 */
final class ActualPackage extends PackageType
{
    protected const ELEMENT_SIGNATURE = 'cac:ActualPackage';
}
