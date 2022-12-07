<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AccountingContact;
use i3or1s\UBL\CAC\BuyerContact;
use i3or1s\UBL\CAC\DeliveryContact;
use i3or1s\UBL\CAC\Party;
use i3or1s\UBL\CBC\AdditionalAccountID;
use i3or1s\UBL\CBC\CustomerAssignedAccountID;
use i3or1s\UBL\CBC\SupplierAssignedAccountID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_CustomerPartyType.html.
 */
abstract class CustomerPartyType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:CustomerPartyType';

    public readonly ?CustomerAssignedAccountID $CustomerAssignedAccountID; // [0..1]    An identifier for the customer's account, assigned by the customer itself.
    public readonly ?SupplierAssignedAccountID $SupplierAssignedAccountID; // [0..1]    An identifier for the customer's account, assigned by the supplier.
    /** @var AdditionalAccountID[]|null */
    public readonly ?array $AdditionalAccountID; // [0..*]    An identifier for the customer's account, assigned by a third party.
    public readonly ?Party $Party; // [0..1]    The customer party itself.
    public readonly ?DeliveryContact $DeliveryContact; // [0..1]    A customer contact for deliveries.
    public readonly ?AccountingContact $AccountingContact; // [0..1]    A customer contact for accounting.
    public readonly ?BuyerContact $BuyerContact; // [0..1]    A customer contact for purchasing.

    /**
     * @param AdditionalAccountID[]|null $AdditionalAccountID
     */
    public function __construct(?CustomerAssignedAccountID $CustomerAssignedAccountID, ?SupplierAssignedAccountID $SupplierAssignedAccountID, ?array $AdditionalAccountID, ?Party $Party, ?DeliveryContact $DeliveryContact, ?AccountingContact $AccountingContact, ?BuyerContact $BuyerContact)
    {
        $this->CustomerAssignedAccountID = $CustomerAssignedAccountID;
        $this->SupplierAssignedAccountID = $SupplierAssignedAccountID;
        $this->AdditionalAccountID = $AdditionalAccountID;
        $this->Party = $Party;
        $this->DeliveryContact = $DeliveryContact;
        $this->AccountingContact = $AccountingContact;
        $this->BuyerContact = $BuyerContact;
    }

    public function __toString()
    {
        $response = [];
        if ($this->CustomerAssignedAccountID) {
            $response[] = (string) $this->CustomerAssignedAccountID;
        }
        if ($this->SupplierAssignedAccountID) {
            $response[] = (string) $this->SupplierAssignedAccountID;
        }
        if ($this->AdditionalAccountID) {
            foreach ($this->AdditionalAccountID as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Party) {
            $response[] = (string) $this->Party;
        }
        if ($this->DeliveryContact) {
            $response[] = (string) $this->DeliveryContact;
        }
        if ($this->AccountingContact) {
            $response[] = (string) $this->AccountingContact;
        }
        if ($this->BuyerContact) {
            $response[] = (string) $this->BuyerContact;
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
