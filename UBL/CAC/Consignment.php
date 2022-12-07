<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ConsignmentType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Consignment.html.
 */
final class Consignment extends ConsignmentType
{
    protected const ELEMENT_SIGNATURE = 'cac:Consignment';
}
