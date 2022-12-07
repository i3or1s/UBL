<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CACType\PartyType;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_DespatchParty.html.
 */
final class DespatchParty extends PartyType
{
    protected const ELEMENT_SIGNATURE = 'cac:DespatchParty';
}
