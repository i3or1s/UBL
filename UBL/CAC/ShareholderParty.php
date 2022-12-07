<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\PartecipationPercent;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ShareholderParty.html.
 */
final class ShareholderParty implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:ShareholderParty';

    public readonly ?PartecipationPercent $PartecipationPercent; // [0..1]    The shareholder participation, expressed as a percentage.
    public readonly ?Party $Party; // [0..1]    The shareholder party.

    public function __construct(?PartecipationPercent $PartecipationPercent, ?Party $Party)
    {
        $this->PartecipationPercent = $PartecipationPercent;
        $this->Party = $Party;
    }

    public function __toString()
    {
        $response = [];
        if ($this->PartecipationPercent) {
            $response[] = (string) $this->PartecipationPercent;
        }
        if ($this->Party) {
            $response[] = (string) $this->Party;
        }

        return sprintf(
            '<%s>%s%s%s</%s>',
            $this::ELEMENT_SIGNATURE,
            PHP_EOL,
            implode(PHP_EOL, $response),
            PHP_EOL,
            $this::ELEMENT_SIGNATURE,
        );
    }
}
