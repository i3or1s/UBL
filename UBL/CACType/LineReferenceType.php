<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\DocumentReference;
use i3or1s\UBL\CBC\LineID;
use i3or1s\UBL\CBC\LineStatusCode;
use i3or1s\UBL\CBC\UUID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_LineReferenceType.html.
 */
abstract class LineReferenceType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:LineReferenceType';

    public readonly LineID $LineID; // [1..1]    Identifies the referenced line in the document.
    public readonly ?UUID $UUID; // [0..1]    A universally unique identifier for this line reference.
    public readonly ?LineStatusCode $LineStatusCode; // [0..1]    A code signifying the status of the referenced line with respect to its original state.
    public readonly ?DocumentReference $DocumentReference; // [0..1]    A reference to the document containing the referenced line.

    public function __construct(LineID $LineID, ?UUID $UUID, ?LineStatusCode $LineStatusCode, ?DocumentReference $DocumentReference)
    {
        $this->LineID = $LineID;
        $this->UUID = $UUID;
        $this->LineStatusCode = $LineStatusCode;
        $this->DocumentReference = $DocumentReference;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->LineID;
        if ($this->UUID) {
            $response[] = (string) $this->UUID;
        }
        if ($this->LineStatusCode) {
            $response[] = (string) $this->LineStatusCode;
        }
        if ($this->DocumentReference) {
            $response[] = (string) $this->DocumentReference;
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
