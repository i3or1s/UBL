<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\ConsignmentType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ReferencedConsignment.html.
 */
final class ReferencedConsignment extends ConsignmentType
{
    protected const ELEMENT_SIGNATURE = 'cac:ReferencedConsignment';
}
