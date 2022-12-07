<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PartyType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PerformingCarrierParty.html.
 */
final class PerformingCarrierParty extends PartyType
{
    protected const ELEMENT_SIGNATURE = 'cac:PerformingCarrierParty';
}
