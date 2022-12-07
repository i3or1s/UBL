<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PackageType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ContainingPackage.html.
 */
final class ContainingPackage extends PackageType
{
    protected const ELEMENT_SIGNATURE = 'cac:ContainingPackage';
}
