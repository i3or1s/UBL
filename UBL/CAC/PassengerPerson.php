<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PersonType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PassengerPerson.html.
 */
final class PassengerPerson extends PersonType
{
    protected const ELEMENT_SIGNATURE = 'cac:PassengerPerson';
}
