<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ActionCode;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\ID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TransactionConditions.html.
 */
final class TransactionConditions implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:TransactionConditions';

    public readonly ?ID $ID; // [0..1]    An identifier for conditions of the transaction, typically purchase/sales conditions.
    public readonly ?ActionCode $ActionCode; // [0..1]    A code signifying a type of action relating to sales or payment conditions.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing the transaction conditions.
    /** @var DocumentReference[]|null */
    public readonly ?array $DocumentReference; // [0..*]    A document associated with these transaction conditions.

    /**
     * @param Description[]|null       $Description
     * @param DocumentReference[]|null $DocumentReference
     */
    public function __construct(?ID $ID, ?ActionCode $ActionCode, ?array $Description, ?array $DocumentReference)
    {
        $this->ID = $ID;
        $this->ActionCode = $ActionCode;
        $this->Description = $Description;
        $this->DocumentReference = $DocumentReference;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->ActionCode) {
            $response[] = (string) $this->ActionCode;
        }
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DocumentReference) {
            foreach ($this->DocumentReference as $elem) {
                $response[] = (string) $elem;
            }
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
