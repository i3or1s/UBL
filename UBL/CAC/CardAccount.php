<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\CardChipCode;
use i3or1s\UBL\CBC\CardTypeCode;
use i3or1s\UBL\CBC\ChipApplicationID;
use i3or1s\UBL\CBC\CV2ID;
use i3or1s\UBL\CBC\ExpiryDate;
use i3or1s\UBL\CBC\HolderName;
use i3or1s\UBL\CBC\IssueNumberID;
use i3or1s\UBL\CBC\IssuerID;
use i3or1s\UBL\CBC\NetworkID;
use i3or1s\UBL\CBC\PrimaryAccountNumberID;
use i3or1s\UBL\CBC\ValidityStartDate;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_CardAccount.html.
 */
final class CardAccount implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:CardAccount';

    public readonly PrimaryAccountNumberID $PrimaryAccountNumberID; // [1..1]    An identifier of the card (e.g., the Primary Account Number (PAN)).
    public readonly NetworkID $NetworkID; // [1..1]    An identifier for the financial service network provider of the card.
    public readonly ?CardTypeCode $CardTypeCode; // [0..1]    A mutually agreed code signifying the type of card. Examples of types are "debit", "credit" and "purchasing"
    public readonly ?ValidityStartDate $ValidityStartDate; // [0..1]    The date from which the card is valid.
    public readonly ?ExpiryDate $ExpiryDate; // [0..1]    The date on which the card expires.
    public readonly ?IssuerID $IssuerID; // [0..1]    An identifier for the institution issuing the card.
    public readonly ?IssueNumberID $IssueNumberID; // [0..1]    An identifier for the card, specified by the issuer.
    public readonly ?CV2ID $CV2ID; // [0..1]    An identifier for the Card Verification Value (often found on the reverse of the card itself).
    public readonly ?CardChipCode $CardChipCode; // [0..1]    A mutually agreed code to distinguish between CHIP and MAG STRIPE cards.
    public readonly ?ChipApplicationID $ChipApplicationID; // [0..1]    An identifier on the chip card for the application that provides the quoted information; an AID (application ID).
    public readonly ?HolderName $HolderName; // [0..1]    The name of the cardholder.

    public function __construct(PrimaryAccountNumberID $PrimaryAccountNumberID, NetworkID $NetworkID, ?CardTypeCode $CardTypeCode, ?ValidityStartDate $ValidityStartDate, ?ExpiryDate $ExpiryDate, ?IssuerID $IssuerID, ?IssueNumberID $IssueNumberID, ?CV2ID $CV2ID, ?CardChipCode $CardChipCode, ?ChipApplicationID $ChipApplicationID, ?HolderName $HolderName)
    {
        $this->PrimaryAccountNumberID = $PrimaryAccountNumberID;
        $this->NetworkID = $NetworkID;
        $this->CardTypeCode = $CardTypeCode;
        $this->ValidityStartDate = $ValidityStartDate;
        $this->ExpiryDate = $ExpiryDate;
        $this->IssuerID = $IssuerID;
        $this->IssueNumberID = $IssueNumberID;
        $this->CV2ID = $CV2ID;
        $this->CardChipCode = $CardChipCode;
        $this->ChipApplicationID = $ChipApplicationID;
        $this->HolderName = $HolderName;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->PrimaryAccountNumberID;
        $response[] = (string) $this->NetworkID;
        if ($this->CardTypeCode) {
            $response[] = (string) $this->CardTypeCode;
        }
        if ($this->ValidityStartDate) {
            $response[] = (string) $this->ValidityStartDate;
        }
        if ($this->ExpiryDate) {
            $response[] = (string) $this->ExpiryDate;
        }
        if ($this->IssuerID) {
            $response[] = (string) $this->IssuerID;
        }
        if ($this->IssueNumberID) {
            $response[] = (string) $this->IssueNumberID;
        }
        if ($this->CV2ID) {
            $response[] = (string) $this->CV2ID;
        }
        if ($this->CardChipCode) {
            $response[] = (string) $this->CardChipCode;
        }
        if ($this->ChipApplicationID) {
            $response[] = (string) $this->ChipApplicationID;
        }
        if ($this->HolderName) {
            $response[] = (string) $this->HolderName;
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
