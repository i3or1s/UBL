<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\InstructionID;
use i3or1s\UBL\CBC\PaidAmount;
use i3or1s\UBL\CBC\PaidDate;
use i3or1s\UBL\CBC\PaidTime;
use i3or1s\UBL\CBC\ReceivedDate;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_PaymentType.html.
 */
abstract class PaymentType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:PaymentType';

    public readonly ?ID $ID; // [0..1]    An identifier for this payment.
    public readonly ?PaidAmount $PaidAmount; // [0..1]    The amount of this payment.
    public readonly ?ReceivedDate $ReceivedDate; // [0..1]    The date on which this payment was received.
    public readonly ?PaidDate $PaidDate; // [0..1]    The date on which this payment was made.
    public readonly ?PaidTime $PaidTime; // [0..1]    The time at which this payment was made.
    public readonly ?InstructionID $InstructionID; // [0..1]    An identifier for the payment instruction.

    public function __construct(?ID $ID, ?PaidAmount $PaidAmount, ?ReceivedDate $ReceivedDate, ?PaidDate $PaidDate, ?PaidTime $PaidTime, ?InstructionID $InstructionID)
    {
        $this->ID = $ID;
        $this->PaidAmount = $PaidAmount;
        $this->ReceivedDate = $ReceivedDate;
        $this->PaidDate = $PaidDate;
        $this->PaidTime = $PaidTime;
        $this->InstructionID = $InstructionID;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->PaidAmount) {
            $response[] = (string) $this->PaidAmount;
        }
        if ($this->ReceivedDate) {
            $response[] = (string) $this->ReceivedDate;
        }
        if ($this->PaidDate) {
            $response[] = (string) $this->PaidDate;
        }
        if ($this->PaidTime) {
            $response[] = (string) $this->PaidTime;
        }
        if ($this->InstructionID) {
            $response[] = (string) $this->InstructionID;
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
