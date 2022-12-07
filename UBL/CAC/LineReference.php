<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\LineReferenceType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_LineReference.html.
 */
final class LineReference extends LineReferenceType
{
    protected const ELEMENT_SIGNATURE = 'cac:LineReference';
}
