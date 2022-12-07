<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PartyType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_GuarantorParty.html.
 */
final class GuarantorParty extends PartyType
{
    protected const ELEMENT_SIGNATURE = 'cac:GuarantorParty';
}
