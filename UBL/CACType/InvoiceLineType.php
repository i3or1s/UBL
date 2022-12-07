<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AllowanceCharge;
use i3or1s\UBL\CAC\BillingReference;
use i3or1s\UBL\CAC\Delivery;
use i3or1s\UBL\CAC\DeliveryTerms;
use i3or1s\UBL\CAC\DespatchLineReference;
use i3or1s\UBL\CAC\DocumentReference;
use i3or1s\UBL\CAC\InvoicePeriod;
use i3or1s\UBL\CAC\Item;
use i3or1s\UBL\CAC\ItemPriceExtension;
use i3or1s\UBL\CAC\OrderLineReference;
use i3or1s\UBL\CAC\OriginatorParty;
use i3or1s\UBL\CAC\PaymentTerms;
use i3or1s\UBL\CAC\Price;
use i3or1s\UBL\CAC\PricingReference;
use i3or1s\UBL\CAC\ReceiptLineReference;
use i3or1s\UBL\CAC\SubInvoiceLine;
use i3or1s\UBL\CAC\TaxTotal;
use i3or1s\UBL\CAC\WithholdingTaxTotal;
use i3or1s\UBL\CBC\AccountingCost;
use i3or1s\UBL\CBC\AccountingCostCode;
use i3or1s\UBL\CBC\FreeOfChargeIndicator;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\InvoicedQuantity;
use i3or1s\UBL\CBC\LineExtensionAmount;
use i3or1s\UBL\CBC\Note;
use i3or1s\UBL\CBC\PaymentPurposeCode;
use i3or1s\UBL\CBC\TaxPointDate;
use i3or1s\UBL\CBC\UUID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_InvoiceLineType.html.
 */
abstract class InvoiceLineType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:InvoiceLineType';

    public readonly ID $ID; // [1..1]    An identifier for this invoice line.
    public readonly ?UUID $UUID; // [0..1]    A universally unique identifier for this invoice line.
    /** @var Note[]|null */
    public readonly ?array $Note; // [0..*]    Free-form text conveying information that is not contained explicitly in other structures.
    public readonly ?InvoicedQuantity $InvoicedQuantity; // [0..1]    The quantity (of items) on this invoice line.
    public readonly LineExtensionAmount $LineExtensionAmount; // [1..1]    The total amount for this invoice line, including allowance charges but net of taxes.
    public readonly ?TaxPointDate $TaxPointDate; // [0..1]    The date of this invoice line, used to indicate the point at which tax becomes applicable.
    public readonly ?AccountingCostCode $AccountingCostCode; // [0..1]    The buyer's accounting cost centre for this invoice line, expressed as a code.
    public readonly ?AccountingCost $AccountingCost; // [0..1]    The buyer's accounting cost centre for this invoice line, expressed as text.
    public readonly ?PaymentPurposeCode $PaymentPurposeCode; // [0..1]    A code signifying the business purpose for this payment.
    public readonly ?FreeOfChargeIndicator $FreeOfChargeIndicator; // [0..1]    An indicator that this invoice line is free of charge (true) or not (false). The default is false.
    /** @var InvoicePeriod[]|null */
    public readonly ?array $InvoicePeriod; // [0..*]    An invoice period to which this invoice line applies.
    /** @var OrderLineReference[]|null */
    public readonly ?array $OrderLineReference; // [0..*]    A reference to an order line associated with this invoice line.
    /** @var DespatchLineReference[]|null */
    public readonly ?array $DespatchLineReference; // [0..*]    A reference to a despatch line associated with this invoice line.
    /** @var ReceiptLineReference[]|null */
    public readonly ?array $ReceiptLineReference; // [0..*]    A reference to a receipt line associated with this invoice line.
    /** @var BillingReference[]|null */
    public readonly ?array $BillingReference; // [0..*]    A reference to a billing document associated with this invoice line.
    /** @var DocumentReference[]|null */
    public readonly ?array $DocumentReference; // [0..*]    A reference to a document associated with this invoice line.
    public readonly ?PricingReference $PricingReference; // [0..1]    A reference to pricing and item location information associated with this invoice line.
    public readonly ?OriginatorParty $OriginatorParty; // [0..1]    The party who originated the Order to which the Invoice is related.
    /** @var Delivery[]|null */
    public readonly ?array $Delivery; // [0..*]    A delivery associated with this invoice line.
    /** @var PaymentTerms[]|null */
    public readonly ?array $PaymentTerms; // [0..*]    A specification of payment terms associated with this invoice line.
    /** @var AllowanceCharge[]|null */
    public readonly ?array $AllowanceCharge; // [0..*]    An allowance or charge associated with this invoice line.
    /** @var TaxTotal[]|null */
    public readonly ?array $TaxTotal; // [0..*]    A total amount of taxes of a particular kind applicable to this invoice line.
    /** @var WithholdingTaxTotal[]|null */
    public readonly ?array $WithholdingTaxTotal; // [0..*]    A reference to a TaxTotal class describing the amount that has been withhold by the authorities, e.g. if the creditor is in dept because of non paid taxes.
    public readonly Item $Item; // [1..1]    The item associated with this invoice line.
    public readonly ?Price $Price; // [0..1]    The price of the item associated with this invoice line.
    public readonly ?DeliveryTerms $DeliveryTerms; // [0..1]    Terms and conditions of the delivery associated with this invoice line.
    /** @var SubInvoiceLine[]|null */
    public readonly ?array $SubInvoiceLine; // [0..*]    An invoice line subsidiary to this invoice line.
    public readonly ?ItemPriceExtension $ItemPriceExtension; // [0..1]    The price extension, calculated by multiplying the price per unit by the quantity of items on this invoice line.

    /**
     * @param Note[]|null                  $Note
     * @param InvoicePeriod[]|null         $InvoicePeriod
     * @param OrderLineReference[]|null    $OrderLineReference
     * @param DespatchLineReference[]|null $DespatchLineReference
     * @param ReceiptLineReference[]|null  $ReceiptLineReference
     * @param BillingReference[]|null      $BillingReference
     * @param DocumentReference[]|null     $DocumentReference
     * @param Delivery[]|null              $Delivery
     * @param PaymentTerms[]|null          $PaymentTerms
     * @param AllowanceCharge[]|null       $AllowanceCharge
     * @param TaxTotal[]|null              $TaxTotal
     * @param WithholdingTaxTotal[]|null   $WithholdingTaxTotal
     * @param SubInvoiceLine[]|null        $SubInvoiceLine
     */
    public function __construct(ID $ID, ?UUID $UUID, ?array $Note, ?InvoicedQuantity $InvoicedQuantity, LineExtensionAmount $LineExtensionAmount, ?TaxPointDate $TaxPointDate, ?AccountingCostCode $AccountingCostCode, ?AccountingCost $AccountingCost, ?PaymentPurposeCode $PaymentPurposeCode, ?FreeOfChargeIndicator $FreeOfChargeIndicator, ?array $InvoicePeriod, ?array $OrderLineReference, ?array $DespatchLineReference, ?array $ReceiptLineReference, ?array $BillingReference, ?array $DocumentReference, ?PricingReference $PricingReference, ?OriginatorParty $OriginatorParty, ?array $Delivery, ?array $PaymentTerms, ?array $AllowanceCharge, ?array $TaxTotal, ?array $WithholdingTaxTotal, Item $Item, ?Price $Price, ?DeliveryTerms $DeliveryTerms, ?array $SubInvoiceLine, ?ItemPriceExtension $ItemPriceExtension)
    {
        $this->ID = $ID;
        $this->UUID = $UUID;
        $this->Note = $Note;
        $this->InvoicedQuantity = $InvoicedQuantity;
        $this->LineExtensionAmount = $LineExtensionAmount;
        $this->TaxPointDate = $TaxPointDate;
        $this->AccountingCostCode = $AccountingCostCode;
        $this->AccountingCost = $AccountingCost;
        $this->PaymentPurposeCode = $PaymentPurposeCode;
        $this->FreeOfChargeIndicator = $FreeOfChargeIndicator;
        $this->InvoicePeriod = $InvoicePeriod;
        $this->OrderLineReference = $OrderLineReference;
        $this->DespatchLineReference = $DespatchLineReference;
        $this->ReceiptLineReference = $ReceiptLineReference;
        $this->BillingReference = $BillingReference;
        $this->DocumentReference = $DocumentReference;
        $this->PricingReference = $PricingReference;
        $this->OriginatorParty = $OriginatorParty;
        $this->Delivery = $Delivery;
        $this->PaymentTerms = $PaymentTerms;
        $this->AllowanceCharge = $AllowanceCharge;
        $this->TaxTotal = $TaxTotal;
        $this->WithholdingTaxTotal = $WithholdingTaxTotal;
        $this->Item = $Item;
        $this->Price = $Price;
        $this->DeliveryTerms = $DeliveryTerms;
        $this->SubInvoiceLine = $SubInvoiceLine;
        $this->ItemPriceExtension = $ItemPriceExtension;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->UUID) {
            $response[] = (string) $this->UUID;
        }
        if ($this->Note) {
            foreach ($this->Note as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->InvoicedQuantity) {
            $response[] = (string) $this->InvoicedQuantity;
        }
        $response[] = (string) $this->LineExtensionAmount;
        if ($this->TaxPointDate) {
            $response[] = (string) $this->TaxPointDate;
        }
        if ($this->AccountingCostCode) {
            $response[] = (string) $this->AccountingCostCode;
        }
        if ($this->AccountingCost) {
            $response[] = (string) $this->AccountingCost;
        }
        if ($this->PaymentPurposeCode) {
            $response[] = (string) $this->PaymentPurposeCode;
        }
        if ($this->FreeOfChargeIndicator) {
            $response[] = (string) $this->FreeOfChargeIndicator;
        }
        if ($this->InvoicePeriod) {
            foreach ($this->InvoicePeriod as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->OrderLineReference) {
            foreach ($this->OrderLineReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DespatchLineReference) {
            foreach ($this->DespatchLineReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ReceiptLineReference) {
            foreach ($this->ReceiptLineReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->BillingReference) {
            foreach ($this->BillingReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DocumentReference) {
            foreach ($this->DocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PricingReference) {
            $response[] = (string) $this->PricingReference;
        }
        if ($this->OriginatorParty) {
            $response[] = (string) $this->OriginatorParty;
        }
        if ($this->Delivery) {
            foreach ($this->Delivery as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PaymentTerms) {
            foreach ($this->PaymentTerms as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->AllowanceCharge) {
            foreach ($this->AllowanceCharge as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TaxTotal) {
            foreach ($this->TaxTotal as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->WithholdingTaxTotal) {
            foreach ($this->WithholdingTaxTotal as $elem) {
                $response[] = (string) $elem;
            }
        }
        $response[] = (string) $this->Item;
        if ($this->Price) {
            $response[] = (string) $this->Price;
        }
        if ($this->DeliveryTerms) {
            $response[] = (string) $this->DeliveryTerms;
        }
        if ($this->SubInvoiceLine) {
            foreach ($this->SubInvoiceLine as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ItemPriceExtension) {
            $response[] = (string) $this->ItemPriceExtension;
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
