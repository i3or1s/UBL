<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\SealingPartyType;
use i3or1s\UBL\CBC\SealIssuerTypeCode;
use i3or1s\UBL\CBC\SealStatusCode;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TransportEquipmentSeal.html.
 */
final class TransportEquipmentSeal implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:TransportEquipmentSeal';

    public readonly ID $ID; // [1..1]    An identifier for this transport equipment seal.
    public readonly ?SealIssuerTypeCode $SealIssuerTypeCode; // [0..1]    A code signifying the type of party that issues and is responsible for this transport equipment seal.
    public readonly ?\i3or1s\UBL\CBC\Condition $Condition; // [0..1]    The condition of this transport equipment seal.
    public readonly ?SealStatusCode $SealStatusCode; // [0..1]    A code signifying the condition of this transport equipment seal.
    public readonly ?SealingPartyType $SealingPartyType; // [0..1]    The role of the sealing party.

    public function __construct(ID $ID, ?SealIssuerTypeCode $SealIssuerTypeCode, ?\i3or1s\UBL\CBC\Condition $Condition, ?SealStatusCode $SealStatusCode, ?SealingPartyType $SealingPartyType)
    {
        $this->ID = $ID;
        $this->SealIssuerTypeCode = $SealIssuerTypeCode;
        $this->Condition = $Condition;
        $this->SealStatusCode = $SealStatusCode;
        $this->SealingPartyType = $SealingPartyType;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->SealIssuerTypeCode) {
            $response[] = (string) $this->SealIssuerTypeCode;
        }
        if ($this->Condition) {
            $response[] = (string) $this->Condition;
        }
        if ($this->SealStatusCode) {
            $response[] = (string) $this->SealStatusCode;
        }
        if ($this->SealingPartyType) {
            $response[] = (string) $this->SealingPartyType;
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
