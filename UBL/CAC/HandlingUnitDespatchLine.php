<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\DespatchLineType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_HandlingUnitDespatchLine.html.
 */
final class HandlingUnitDespatchLine extends DespatchLineType
{
    protected const ELEMENT_SIGNATURE = 'cac:HandlingUnitDespatchLine';
}
