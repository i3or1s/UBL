<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Name;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_FinancialInstitution.html.
 */
final class FinancialInstitution implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:FinancialInstitution';

    public readonly ?ID $ID; // [0..1]    An identifier for this financial institution. It is recommended that the ISO 9362 Bank Identification Code (BIC) be used as the ID.
    public readonly ?Name $Name; // [0..1]    The name of this financial institution.
    public readonly ?Address $Address; // [0..1]    The address of this financial institution.

    public function __construct(?ID $ID, ?Name $Name, ?Address $Address)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Address = $Address;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->Name) {
            $response[] = (string) $this->Name;
        }
        if ($this->Address) {
            $response[] = (string) $this->Address;
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
