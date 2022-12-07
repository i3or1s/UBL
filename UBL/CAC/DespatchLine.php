<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DespatchLineType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_DespatchLine.html.
 */
final class DespatchLine extends DespatchLineType
{
    protected const ELEMENT_SIGNATURE = 'cac:DespatchLine';
}
