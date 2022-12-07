<?php

namespace i3or1s\UBL;

use i3or1s\UBL\CAC\AccountingCustomerParty;
use i3or1s\UBL\CAC\AccountingSupplierParty;
use i3or1s\UBL\CAC\AdditionalDocumentReference;
use i3or1s\UBL\CAC\AllowanceCharge;
use i3or1s\UBL\CAC\BillingReference;
use i3or1s\UBL\CAC\BuyerCustomerParty;
use i3or1s\UBL\CAC\ContractDocumentReference;
use i3or1s\UBL\CAC\Delivery;
use i3or1s\UBL\CAC\DeliveryTerms;
use i3or1s\UBL\CAC\DespatchDocumentReference;
use i3or1s\UBL\CAC\InvoiceLine;
use i3or1s\UBL\CAC\InvoicePeriod;
use i3or1s\UBL\CAC\LegalMonetaryTotal;
use i3or1s\UBL\CAC\OrderReference;
use i3or1s\UBL\CAC\OriginatorDocumentReference;
use i3or1s\UBL\CAC\PayeeParty;
use i3or1s\UBL\CAC\PaymentAlternativeExchangeRate;
use i3or1s\UBL\CAC\PaymentExchangeRate;
use i3or1s\UBL\CAC\PaymentMeans;
use i3or1s\UBL\CAC\PaymentTerms;
use i3or1s\UBL\CAC\PrepaidPayment;
use i3or1s\UBL\CAC\PricingExchangeRate;
use i3or1s\UBL\CAC\ProjectReference;
use i3or1s\UBL\CAC\ReceiptDocumentReference;
use i3or1s\UBL\CAC\SellerSupplierParty;
use i3or1s\UBL\CAC\Signature;
use i3or1s\UBL\CAC\StatementDocumentReference;
use i3or1s\UBL\CAC\TaxExchangeRate;
use i3or1s\UBL\CAC\TaxRepresentativeParty;
use i3or1s\UBL\CAC\TaxTotal;
use i3or1s\UBL\CAC\WithholdingTaxTotal;
use i3or1s\UBL\CBC\AccountingCost;
use i3or1s\UBL\CBC\AccountingCostCode;
use i3or1s\UBL\CBC\BuyerReference;
use i3or1s\UBL\CBC\CopyIndicator;
use i3or1s\UBL\CBC\CustomizationID;
use i3or1s\UBL\CBC\DocumentCurrencyCode;
use i3or1s\UBL\CBC\DueDate;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\InvoiceTypeCode;
use i3or1s\UBL\CBC\IssueDate;
use i3or1s\UBL\CBC\IssueTime;
use i3or1s\UBL\CBC\LineCountNumeric;
use i3or1s\UBL\CBC\Note;
use i3or1s\UBL\CBC\PaymentAlternativeCurrencyCode;
use i3or1s\UBL\CBC\PaymentCurrencyCode;
use i3or1s\UBL\CBC\PricingCurrencyCode;
use i3or1s\UBL\CBC\ProfileExecutionID;
use i3or1s\UBL\CBC\ProfileID;
use i3or1s\UBL\CBC\TaxCurrencyCode;
use i3or1s\UBL\CBC\TaxPointDate;
use i3or1s\UBL\CBC\UBLVersionID;
use i3or1s\UBL\CBC\UUID;
use i3or1s\UBL\EXT\UBLExtensions;

/**
 * Built from http://www.datypic.com/sc/ubl21/e-ns39_Invoice.html.
 */
final class Invoice implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'Invoice';

    public readonly ?UBLExtensions $UBLExtensions; // [0..1]   A container for all extensions present in the document.
    public readonly ?UBLVersionID $UBLVersionID; // [0..1]    Identifies the earliest version of the UBL 2 schema for this document type that defines all of the elements that might be encountered in the current instance.
    public readonly ?CustomizationID $CustomizationID; // [0..1]    Identifies a user-defined customization of UBL for a specific use.
    public readonly ?ProfileID $ProfileID; // [0..1]    Identifies a user-defined profile of the customization of UBL being used.
    public readonly ?ProfileExecutionID $ProfileExecutionID; // [0..1]    Identifies an instance of executing a profile, to associate all transactions in a collaboration.
    public readonly ID $ID; // [1..1]    An identifier for this document, assigned by the sender.
    public readonly ?CopyIndicator $CopyIndicator; // [0..1]    Indicates whether this document is a copy (true) or not (false).
    public readonly ?UUID $UUID; // [0..1]    A universally unique identifier for an instance of this document.
    public readonly IssueDate $IssueDate; // [1..1]    The date, assigned by the sender, on which this document was issued.
    public readonly ?IssueTime $IssueTime; // [0..1]    The time, assigned by the sender, at which this document was issued.
    public readonly ?DueDate $DueDate; // [0..1]    The date on which Invoice is due.
    public readonly ?InvoiceTypeCode $InvoiceTypeCode; // [0..1]    A code signifying the type of the Invoice.
    /** @var Note[]|null */
    public readonly ?array $Note; // [0..*]    Free-form text pertinent to this document, conveying information that is not contained explicitly in other structures.
    public readonly ?TaxPointDate $TaxPointDate; // [0..1]    The date of the Invoice, used to indicate the point at which tax becomes applicable.
    public readonly ?DocumentCurrencyCode $DocumentCurrencyCode; // [0..1]    A code signifying the default currency for this document.
    public readonly ?TaxCurrencyCode $TaxCurrencyCode; // [0..1]    A code signifying the currency used for tax amounts in the Invoice.
    public readonly ?PricingCurrencyCode $PricingCurrencyCode; // [0..1]    A code signifying the currency used for prices in the Invoice.
    public readonly ?PaymentCurrencyCode $PaymentCurrencyCode; // [0..1]    A code signifying the currency used for payment in the Invoice.
    public readonly ?PaymentAlternativeCurrencyCode $PaymentAlternativeCurrencyCode; // [0..1]    A code signifying the alternative currency used for payment in the Invoice.
    public readonly ?AccountingCostCode $AccountingCostCode; // [0..1]    The buyer's accounting code, applied to the Invoice as a whole.
    public readonly ?AccountingCost $AccountingCost; // [0..1]    The buyer's accounting code, applied to the Invoice as a whole, expressed as text.
    public readonly ?LineCountNumeric $LineCountNumeric; // [0..1]    The number of lines in the document.
    public readonly ?BuyerReference $BuyerReference; // [0..1]    A reference provided by the buyer used for internal routing of the document.
    /** @var InvoicePeriod[]|null */
    public readonly ?array $InvoicePeriod; // [0..*]    A period to which the Invoice applies.
    public readonly ?OrderReference $OrderReference; // [0..1]    A reference to the Order with which this Invoice is associated.
    /** @var BillingReference[]|null */
    public readonly ?array $BillingReference; // [0..*]    A reference to a billing document associated with this document.
    /** @var DespatchDocumentReference[]|null */
    public readonly ?array $DespatchDocumentReference; // [0..*]    A reference to a Despatch Advice associated with this document.
    /** @var ReceiptDocumentReference[]|null */
    public readonly ?array $ReceiptDocumentReference; // [0..*]    A reference to a Receipt Advice associated with this document.
    /** @var StatementDocumentReference[]|null */
    public readonly ?array $StatementDocumentReference; // [0..*]    A reference to a Statement associated with this document.
    /** @var OriginatorDocumentReference[]|null */
    public readonly ?array $OriginatorDocumentReference; // [0..*]    A reference to an originator document associated with this document.
    /** @var ContractDocumentReference[]|null */
    public readonly ?array $ContractDocumentReference; // [0..*]    A reference to a contract associated with this document.
    /** @var AdditionalDocumentReference[]|null */
    public readonly ?array $AdditionalDocumentReference; // [0..*]    A reference to an additional document associated with this document.
    /** @var ProjectReference[]|null */
    public readonly ?array $ProjectReference; // [0..*]    Information about a project.
    /** @var Signature[]|null */
    public readonly ?array $Signature; // [0..*]    A signature applied to this document.
    public readonly AccountingSupplierParty $AccountingSupplierParty; // [1..1]    The accounting supplier party.
    public readonly AccountingCustomerParty $AccountingCustomerParty; // [1..1]    The accounting customer party.
    public readonly ?PayeeParty $PayeeParty; // [0..1]    The payee.
    public readonly ?BuyerCustomerParty $BuyerCustomerParty; // [0..1]    The buyer.
    public readonly ?SellerSupplierParty $SellerSupplierParty; // [0..1]    The seller.
    public readonly ?TaxRepresentativeParty $TaxRepresentativeParty; // [0..1]    The tax representative.
    /** @var Delivery[]|null */
    public readonly ?array $Delivery; // [0..*]    A delivery associated with this document.
    public readonly ?DeliveryTerms $DeliveryTerms; // [0..1]    A set of delivery terms associated with this document.
    /** @var PaymentMeans[]|null */
    public readonly ?array $PaymentMeans; // [0..*]    Expected means of payment.
    /** @var PaymentTerms[]|null */
    public readonly ?array $PaymentTerms; // [0..*]    A set of payment terms associated with this document.
    /** @var PrepaidPayment[]|null */
    public readonly ?array $PrepaidPayment; // [0..*]    A prepaid payment.
    /** @var AllowanceCharge[]|null */
    public readonly ?array $AllowanceCharge; // [0..*]    A discount or charge that applies to a price component.
    public readonly ?TaxExchangeRate $TaxExchangeRate; // [0..1]    The exchange rate between the document currency and the tax currency.
    public readonly ?PricingExchangeRate $PricingExchangeRate; // [0..1]    The exchange rate between the document currency and the pricing currency.
    public readonly ?PaymentExchangeRate $PaymentExchangeRate; // [0..1]    The exchange rate between the document currency and the payment currency.
    public readonly ?PaymentAlternativeExchangeRate $PaymentAlternativeExchangeRate; // [0..1]    The exchange rate between the document currency and the payment alternative currency.
    /** @var TaxTotal[]|null */
    public readonly ?array $TaxTotal; // [0..*]    The total amount of a specific type of tax.
    /** @var WithholdingTaxTotal[]|null */
    public readonly ?array $WithholdingTaxTotal; // [0..*]    The total withholding tax.
    public readonly LegalMonetaryTotal $LegalMonetaryTotal; // [1..1]    The total amount payable on the Invoice, including Allowances, Charges, and Taxes.
    /** @var InvoiceLine[] */
    public readonly array $InvoiceLine; // [1..*]    A line describing an invoice item.

    /**
     * @param Note[]|null                        $Note
     * @param InvoicePeriod[]|null               $InvoicePeriod
     * @param BillingReference[]|null            $BillingReference
     * @param DespatchDocumentReference[]|null   $DespatchDocumentReference
     * @param ReceiptDocumentReference[]|null    $ReceiptDocumentReference
     * @param StatementDocumentReference[]|null  $StatementDocumentReference
     * @param OriginatorDocumentReference[]|null $OriginatorDocumentReference
     * @param ContractDocumentReference[]|null   $ContractDocumentReference
     * @param AdditionalDocumentReference[]|null $AdditionalDocumentReference
     * @param ProjectReference[]|null            $ProjectReference
     * @param Signature[]|null                   $Signature
     * @param Delivery[]|null                    $Delivery
     * @param PaymentMeans[]|null                $PaymentMeans
     * @param PaymentTerms[]|null                $PaymentTerms
     * @param PrepaidPayment[]|null              $PrepaidPayment
     * @param AllowanceCharge[]|null             $AllowanceCharge
     * @param TaxTotal[]|null                    $TaxTotal
     * @param WithholdingTaxTotal[]|null         $WithholdingTaxTotal
     * @param InvoiceLine[]                      $InvoiceLine
     */
    public function __construct(?UBLExtensions $UBLExtensions, ?UBLVersionID $UBLVersionID, ?CustomizationID $CustomizationID, ?ProfileID $ProfileID, ?ProfileExecutionID $ProfileExecutionID, ID $ID, ?CopyIndicator $CopyIndicator, ?UUID $UUID, IssueDate $IssueDate, ?IssueTime $IssueTime, ?DueDate $DueDate, ?InvoiceTypeCode $InvoiceTypeCode, ?array $Note, ?TaxPointDate $TaxPointDate, ?DocumentCurrencyCode $DocumentCurrencyCode, ?TaxCurrencyCode $TaxCurrencyCode, ?PricingCurrencyCode $PricingCurrencyCode, ?PaymentCurrencyCode $PaymentCurrencyCode, ?PaymentAlternativeCurrencyCode $PaymentAlternativeCurrencyCode, ?AccountingCostCode $AccountingCostCode, ?AccountingCost $AccountingCost, ?LineCountNumeric $LineCountNumeric, ?BuyerReference $BuyerReference, ?array $InvoicePeriod, ?OrderReference $OrderReference, ?array $BillingReference, ?array $DespatchDocumentReference, ?array $ReceiptDocumentReference, ?array $StatementDocumentReference, ?array $OriginatorDocumentReference, ?array $ContractDocumentReference, ?array $AdditionalDocumentReference, ?array $ProjectReference, ?array $Signature, AccountingSupplierParty $AccountingSupplierParty, AccountingCustomerParty $AccountingCustomerParty, ?PayeeParty $PayeeParty, ?BuyerCustomerParty $BuyerCustomerParty, ?SellerSupplierParty $SellerSupplierParty, ?TaxRepresentativeParty $TaxRepresentativeParty, ?array $Delivery, ?DeliveryTerms $DeliveryTerms, ?array $PaymentMeans, ?array $PaymentTerms, ?array $PrepaidPayment, ?array $AllowanceCharge, ?TaxExchangeRate $TaxExchangeRate, ?PricingExchangeRate $PricingExchangeRate, ?PaymentExchangeRate $PaymentExchangeRate, ?PaymentAlternativeExchangeRate $PaymentAlternativeExchangeRate, ?array $TaxTotal, ?array $WithholdingTaxTotal, LegalMonetaryTotal $LegalMonetaryTotal, array $InvoiceLine)
    {
        $this->UBLExtensions = $UBLExtensions;
        $this->UBLVersionID = $UBLVersionID;
        $this->CustomizationID = $CustomizationID;
        $this->ProfileID = $ProfileID;
        $this->ProfileExecutionID = $ProfileExecutionID;
        $this->ID = $ID;
        $this->CopyIndicator = $CopyIndicator;
        $this->UUID = $UUID;
        $this->IssueDate = $IssueDate;
        $this->IssueTime = $IssueTime;
        $this->DueDate = $DueDate;
        $this->InvoiceTypeCode = $InvoiceTypeCode;
        $this->Note = $Note;
        $this->TaxPointDate = $TaxPointDate;
        $this->DocumentCurrencyCode = $DocumentCurrencyCode;
        $this->TaxCurrencyCode = $TaxCurrencyCode;
        $this->PricingCurrencyCode = $PricingCurrencyCode;
        $this->PaymentCurrencyCode = $PaymentCurrencyCode;
        $this->PaymentAlternativeCurrencyCode = $PaymentAlternativeCurrencyCode;
        $this->AccountingCostCode = $AccountingCostCode;
        $this->AccountingCost = $AccountingCost;
        $this->LineCountNumeric = $LineCountNumeric;
        $this->BuyerReference = $BuyerReference;
        $this->InvoicePeriod = $InvoicePeriod;
        $this->OrderReference = $OrderReference;
        $this->BillingReference = $BillingReference;
        $this->DespatchDocumentReference = $DespatchDocumentReference;
        $this->ReceiptDocumentReference = $ReceiptDocumentReference;
        $this->StatementDocumentReference = $StatementDocumentReference;
        $this->OriginatorDocumentReference = $OriginatorDocumentReference;
        $this->ContractDocumentReference = $ContractDocumentReference;
        $this->AdditionalDocumentReference = $AdditionalDocumentReference;
        $this->ProjectReference = $ProjectReference;
        $this->Signature = $Signature;
        $this->AccountingSupplierParty = $AccountingSupplierParty;
        $this->AccountingCustomerParty = $AccountingCustomerParty;
        $this->PayeeParty = $PayeeParty;
        $this->BuyerCustomerParty = $BuyerCustomerParty;
        $this->SellerSupplierParty = $SellerSupplierParty;
        $this->TaxRepresentativeParty = $TaxRepresentativeParty;
        $this->Delivery = $Delivery;
        $this->DeliveryTerms = $DeliveryTerms;
        $this->PaymentMeans = $PaymentMeans;
        $this->PaymentTerms = $PaymentTerms;
        $this->PrepaidPayment = $PrepaidPayment;
        $this->AllowanceCharge = $AllowanceCharge;
        $this->TaxExchangeRate = $TaxExchangeRate;
        $this->PricingExchangeRate = $PricingExchangeRate;
        $this->PaymentExchangeRate = $PaymentExchangeRate;
        $this->PaymentAlternativeExchangeRate = $PaymentAlternativeExchangeRate;
        $this->TaxTotal = $TaxTotal;
        $this->WithholdingTaxTotal = $WithholdingTaxTotal;
        $this->LegalMonetaryTotal = $LegalMonetaryTotal;
        $this->InvoiceLine = $InvoiceLine;
    }

    public function __toString()
    {
        $response = [];
        if ($this->UBLExtensions) {
            $response[] = (string) $this->UBLExtensions;
        }
        if ($this->UBLVersionID) {
            $response[] = (string) $this->UBLVersionID;
        }
        if ($this->CustomizationID) {
            $response[] = (string) $this->CustomizationID;
        }
        if ($this->ProfileID) {
            $response[] = (string) $this->ProfileID;
        }
        if ($this->ProfileExecutionID) {
            $response[] = (string) $this->ProfileExecutionID;
        }
        $response[] = (string) $this->ID;
        if ($this->CopyIndicator) {
            $response[] = (string) $this->CopyIndicator;
        }
        if ($this->UUID) {
            $response[] = (string) $this->UUID;
        }
        $response[] = (string) $this->IssueDate;
        if ($this->IssueTime) {
            $response[] = (string) $this->IssueTime;
        }
        if ($this->DueDate) {
            $response[] = (string) $this->DueDate;
        }
        if ($this->InvoiceTypeCode) {
            $response[] = (string) $this->InvoiceTypeCode;
        }
        if ($this->Note) {
            foreach ($this->Note as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TaxPointDate) {
            $response[] = (string) $this->TaxPointDate;
        }
        if ($this->DocumentCurrencyCode) {
            $response[] = (string) $this->DocumentCurrencyCode;
        }
        if ($this->TaxCurrencyCode) {
            $response[] = (string) $this->TaxCurrencyCode;
        }
        if ($this->PricingCurrencyCode) {
            $response[] = (string) $this->PricingCurrencyCode;
        }
        if ($this->PaymentCurrencyCode) {
            $response[] = (string) $this->PaymentCurrencyCode;
        }
        if ($this->PaymentAlternativeCurrencyCode) {
            $response[] = (string) $this->PaymentAlternativeCurrencyCode;
        }
        if ($this->AccountingCostCode) {
            $response[] = (string) $this->AccountingCostCode;
        }
        if ($this->AccountingCost) {
            $response[] = (string) $this->AccountingCost;
        }
        if ($this->LineCountNumeric) {
            $response[] = (string) $this->LineCountNumeric;
        }
        if ($this->BuyerReference) {
            $response[] = (string) $this->BuyerReference;
        }
        if ($this->InvoicePeriod) {
            foreach ($this->InvoicePeriod as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->OrderReference) {
            $response[] = (string) $this->OrderReference;
        }
        if ($this->BillingReference) {
            foreach ($this->BillingReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DespatchDocumentReference) {
            foreach ($this->DespatchDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ReceiptDocumentReference) {
            foreach ($this->ReceiptDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->StatementDocumentReference) {
            foreach ($this->StatementDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->OriginatorDocumentReference) {
            foreach ($this->OriginatorDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ContractDocumentReference) {
            foreach ($this->ContractDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->AdditionalDocumentReference) {
            foreach ($this->AdditionalDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ProjectReference) {
            foreach ($this->ProjectReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Signature) {
            foreach ($this->Signature as $elem) {
                $response[] = (string) $elem;
            }
        }
        $response[] = (string) $this->AccountingSupplierParty;
        $response[] = (string) $this->AccountingCustomerParty;
        if ($this->PayeeParty) {
            $response[] = (string) $this->PayeeParty;
        }
        if ($this->BuyerCustomerParty) {
            $response[] = (string) $this->BuyerCustomerParty;
        }
        if ($this->SellerSupplierParty) {
            $response[] = (string) $this->SellerSupplierParty;
        }
        if ($this->TaxRepresentativeParty) {
            $response[] = (string) $this->TaxRepresentativeParty;
        }
        if ($this->Delivery) {
            foreach ($this->Delivery as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DeliveryTerms) {
            $response[] = (string) $this->DeliveryTerms;
        }
        if ($this->PaymentMeans) {
            foreach ($this->PaymentMeans as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PaymentTerms) {
            foreach ($this->PaymentTerms as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PrepaidPayment) {
            foreach ($this->PrepaidPayment as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->AllowanceCharge) {
            foreach ($this->AllowanceCharge as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TaxExchangeRate) {
            $response[] = (string) $this->TaxExchangeRate;
        }
        if ($this->PricingExchangeRate) {
            $response[] = (string) $this->PricingExchangeRate;
        }
        if ($this->PaymentExchangeRate) {
            $response[] = (string) $this->PaymentExchangeRate;
        }
        if ($this->PaymentAlternativeExchangeRate) {
            $response[] = (string) $this->PaymentAlternativeExchangeRate;
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
        $response[] = (string) $this->LegalMonetaryTotal;
        foreach ($this->InvoiceLine as $elem) {
            $response[] = (string) $elem;
        }

        return sprintf(
            '<%s xmlns:cec="urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2" xmlns:cac="urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2" xmlns:cbc="urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:sbt="http://mfin.gov.rs/srbdt/srbdtext" xmlns="urn:oasis:names:specification:ubl:schema:xsd:Invoice-2">%s%s%s</%s>',
            $this::ELEMENT_SIGNATURE,
            PHP_EOL,
            implode(PHP_EOL, $response),
            PHP_EOL,
            $this::ELEMENT_SIGNATURE,
        );
    }
}
