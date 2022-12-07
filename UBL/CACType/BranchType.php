<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\Address;
use i3or1s\UBL\CAC\FinancialInstitution;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Name;

abstract class BranchType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:BranchType';

    public readonly ?ID $ID; // [0..1]    An identifier for this branch or division of an organization.
    public readonly ?Name $Name; // [0..1]    The name of this branch or division of an organization.
    public readonly ?FinancialInstitution $FinancialInstitution; // [0..1]    The financial institution that this branch belongs to (if applicable).
    public readonly ?Address $Address; // [0..1]    The address of this branch or division.

    public function __construct(?ID $ID, ?Name $Name, ?FinancialInstitution $FinancialInstitution, ?Address $Address)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->FinancialInstitution = $FinancialInstitution;
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
        if ($this->FinancialInstitution) {
            $response[] = (string) $this->FinancialInstitution;
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
