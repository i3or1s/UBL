<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\LineID;
use i3or1s\UBL\CBC\LineStatusCode;
use i3or1s\UBL\CBC\SalesOrderLineID;
use i3or1s\UBL\CBC\UUID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_OrderLineReference.html.
 */
final class OrderLineReference implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:OrderLineReference';

    public readonly LineID $LineID; // [1..1]    An identifier for the referenced order line, assigned by the buyer.
    public readonly ?SalesOrderLineID $SalesOrderLineID; // [0..1]    An identifier for the referenced order line, assigned by the seller.
    public readonly ?UUID $UUID; // [0..1]    A universally unique identifier for this order line reference.
    public readonly ?LineStatusCode $LineStatusCode; // [0..1]    A code signifying the status of the referenced order line with respect to its original state.
    public readonly ?OrderReference $OrderReference; // [0..1]    A reference to the Order containing the referenced order line.

    public function __construct(LineID $LineID, ?SalesOrderLineID $SalesOrderLineID, ?UUID $UUID, ?LineStatusCode $LineStatusCode, ?OrderReference $OrderReference)
    {
        $this->LineID = $LineID;
        $this->SalesOrderLineID = $SalesOrderLineID;
        $this->UUID = $UUID;
        $this->LineStatusCode = $LineStatusCode;
        $this->OrderReference = $OrderReference;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->LineID;
        if ($this->SalesOrderLineID) {
            $response[] = (string) $this->SalesOrderLineID;
        }
        if ($this->UUID) {
            $response[] = (string) $this->UUID;
        }
        if ($this->LineStatusCode) {
            $response[] = (string) $this->LineStatusCode;
        }
        if ($this->OrderReference) {
            $response[] = (string) $this->OrderReference;
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
