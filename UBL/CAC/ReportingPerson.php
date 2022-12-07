<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PersonType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ReportingPerson.html.
 */
final class ReportingPerson extends PersonType
{
    protected const ELEMENT_SIGNATURE = 'cac:ReportingPerson';
}
