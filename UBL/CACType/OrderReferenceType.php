<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\DocumentReference;
use i3or1s\UBL\CBC\CopyIndicator;
use i3or1s\UBL\CBC\CustomerReference;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\IssueDate;
use i3or1s\UBL\CBC\IssueTime;
use i3or1s\UBL\CBC\OrderTypeCode;
use i3or1s\UBL\CBC\SalesOrderID;
use i3or1s\UBL\CBC\UUID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_OrderReferenceType.html.
 */
abstract class OrderReferenceType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:OrderReferenceType';

    public readonly ID $ID; // [1..1]    An identifier for this order reference, assigned by the buyer.
    public readonly ?SalesOrderID $SalesOrderID; // [0..1]    An identifier for this order reference, assigned by the seller.
    public readonly ?CopyIndicator $CopyIndicator;   // [0..1]    Indicates whether the referenced Order is a copy (true) or the original (false).
    public readonly ?UUID $UUID; // [0..1]    A universally unique identifier for this order reference.
    public readonly ?IssueDate $IssueDate;   // [0..1]    The date on which the referenced Order was issued.
    public readonly ?IssueTime $IssueTime;   // [0..1]    The time at which the referenced Order was issued.
    public readonly ?CustomerReference $CustomerReference;   // [0..1]    Text used for tagging purchasing card transactions.
    public readonly ?OrderTypeCode $OrderTypeCode;   // [0..1]    A code signifying the type of the referenced Order.
    public readonly ?DocumentReference $DocumentReference;   // [0..1]    A document associated with this reference to an Order.

    public function __construct(ID $ID, ?SalesOrderID $SalesOrderID, ?CopyIndicator $CopyIndicator, ?UUID $UUID, ?IssueDate $IssueDate, ?IssueTime $IssueTime, ?CustomerReference $CustomerReference, ?OrderTypeCode $OrderTypeCode, ?DocumentReference $DocumentReference)
    {
        $this->ID = $ID;
        $this->SalesOrderID = $SalesOrderID;
        $this->CopyIndicator = $CopyIndicator;
        $this->UUID = $UUID;
        $this->IssueDate = $IssueDate;
        $this->IssueTime = $IssueTime;
        $this->CustomerReference = $CustomerReference;
        $this->OrderTypeCode = $OrderTypeCode;
        $this->DocumentReference = $DocumentReference;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->SalesOrderID) {
            $response[] = (string) $this->SalesOrderID;
        }
        if ($this->CopyIndicator) {
            $response[] = (string) $this->CopyIndicator;
        }
        if ($this->UUID) {
            $response[] = (string) $this->UUID;
        }
        if ($this->IssueDate) {
            $response[] = (string) $this->IssueDate;
        }
        if ($this->IssueTime) {
            $response[] = (string) $this->IssueTime;
        }
        if ($this->CustomerReference) {
            $response[] = (string) $this->CustomerReference;
        }
        if ($this->OrderTypeCode) {
            $response[] = (string) $this->OrderTypeCode;
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
