<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AccountingContact;
use i3or1s\UBL\CAC\DespatchContact;
use i3or1s\UBL\CAC\Party;
use i3or1s\UBL\CAC\SellerContact;
use i3or1s\UBL\CBC\AdditionalAccountID;
use i3or1s\UBL\CBC\CustomerAssignedAccountID;
use i3or1s\UBL\CBC\DataSendingCapability;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_SupplierPartyType.html.
 */
abstract class SupplierPartyType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:SupplierPartyType';

    public readonly ?CustomerAssignedAccountID $CustomerAssignedAccountID; // [0..1]    An identifier for this supplier party, assigned by the customer.
    /** @var AdditionalAccountID[]|null */
    public readonly ?array $AdditionalAccountID; // [0..*]    An additional identifier for this supplier party.
    public readonly ?DataSendingCapability $DataSendingCapability; // [0..1]    Text describing the supplier's ability to send invoice data via a purchase card provider (e.g., VISA, MasterCard, American Express).
    public readonly ?Party $Party; // [0..1]    The supplier party itself.
    public readonly ?DespatchContact $DespatchContact; // [0..1]    A contact at this supplier party for despatches (pickups).
    public readonly ?AccountingContact $AccountingContact; // [0..1]    A contact at this supplier party for accounting.
    public readonly ?SellerContact $SellerContact; // [0..1]    The primary contact for this supplier party.

    /**
     * @param AdditionalAccountID[]|null $AdditionalAccountID
     */
    public function __construct(?CustomerAssignedAccountID $CustomerAssignedAccountID, ?array $AdditionalAccountID, ?DataSendingCapability $DataSendingCapability, ?Party $Party, ?DespatchContact $DespatchContact, ?AccountingContact $AccountingContact, ?SellerContact $SellerContact)
    {
        $this->CustomerAssignedAccountID = $CustomerAssignedAccountID;
        $this->AdditionalAccountID = $AdditionalAccountID;
        $this->DataSendingCapability = $DataSendingCapability;
        $this->Party = $Party;
        $this->DespatchContact = $DespatchContact;
        $this->AccountingContact = $AccountingContact;
        $this->SellerContact = $SellerContact;
    }

    public function __toString()
    {
        $response = [];
        if ($this->CustomerAssignedAccountID) {
            $response[] = (string) $this->CustomerAssignedAccountID;
        }
        if ($this->AdditionalAccountID) {
            foreach ($this->AdditionalAccountID as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DataSendingCapability) {
            $response[] = (string) $this->DataSendingCapability;
        }
        if ($this->Party) {
            $response[] = (string) $this->Party;
        }
        if ($this->DespatchContact) {
            $response[] = (string) $this->DespatchContact;
        }
        if ($this->AccountingContact) {
            $response[] = (string) $this->AccountingContact;
        }
        if ($this->SellerContact) {
            $response[] = (string) $this->SellerContact;
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
