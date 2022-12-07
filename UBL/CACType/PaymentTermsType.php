<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\ExchangeRate;
use i3or1s\UBL\CAC\PenaltyPeriod;
use i3or1s\UBL\CAC\SettlementPeriod;
use i3or1s\UBL\CAC\ValidityPeriod;
use i3or1s\UBL\CBC\Amount;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\InstallmentDueDate;
use i3or1s\UBL\CBC\InvoicingPartyReference;
use i3or1s\UBL\CBC\Note;
use i3or1s\UBL\CBC\PaymentDueDate;
use i3or1s\UBL\CBC\PaymentMeansID;
use i3or1s\UBL\CBC\PaymentPercent;
use i3or1s\UBL\CBC\PaymentTermsDetailsURI;
use i3or1s\UBL\CBC\PenaltyAmount;
use i3or1s\UBL\CBC\PenaltySurchargePercent;
use i3or1s\UBL\CBC\PrepaidPaymentReferenceID;
use i3or1s\UBL\CBC\ReferenceEventCode;
use i3or1s\UBL\CBC\SettlementDiscountAmount;
use i3or1s\UBL\CBC\SettlementDiscountPercent;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_PaymentTermsType.html.
 */
abstract class PaymentTermsType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:PaymentTermsType';

    public readonly ?ID $ID; // [0..1]    An identifier for this set of payment terms.
    /** @var PaymentMeansID[]|null */
    public readonly ?array $PaymentMeansID; // [0..*]    An identifier for a means of payment associated with these payment terms.
    public readonly ?PrepaidPaymentReferenceID $PrepaidPaymentReferenceID; // [0..1]    An identifier for a reference to a prepaid payment.
    /** @var Note[]|null */
    public readonly ?array $Note; // [0..*]    Free-form text conveying information that is not contained explicitly in other structures.
    public readonly ?ReferenceEventCode $ReferenceEventCode; // [0..1]    A code signifying the event during which these terms are offered.
    public readonly ?SettlementDiscountPercent $SettlementDiscountPercent; // [0..1]    The percentage for the settlement discount that is offered for payment under these payment terms.
    public readonly ?PenaltySurchargePercent $PenaltySurchargePercent; // [0..1]    The penalty for payment after the settlement period, expressed as a percentage of the payment.
    public readonly ?PaymentPercent $PaymentPercent; // [0..1]    The part of a payment, expressed as a percent, relevant for these payment terms.
    public readonly ?Amount $Amount; // [0..1]    The monetary amount covered by these payment terms.
    public readonly ?SettlementDiscountAmount $SettlementDiscountAmount; // [0..1]    The amount of a settlement discount offered for payment under these payment terms.
    public readonly ?PenaltyAmount $PenaltyAmount; // [0..1]    The monetary amount of the penalty for payment after the settlement period.
    public readonly ?PaymentTermsDetailsURI $PaymentTermsDetailsURI; // [0..1]    The Uniform Resource Identifier (URI) of a document providing additional details regarding these payment terms.
    public readonly ?PaymentDueDate $PaymentDueDate; // [0..1]    The due date for these payment terms.
    public readonly ?InstallmentDueDate $InstallmentDueDate; // [0..1]    The due date for an installment payment for these payment terms.
    public readonly ?InvoicingPartyReference $InvoicingPartyReference; // [0..1]    A reference to the payment terms used by the invoicing party. This may have been requested of the payer by the payee to accompany its remittance.
    public readonly ?SettlementPeriod $SettlementPeriod; // [0..1]    The period during which settlement may occur.
    public readonly ?PenaltyPeriod $PenaltyPeriod; // [0..1]    The period during which penalties may apply.
    public readonly ?ExchangeRate $ExchangeRate; // [0..1]    The currency exchange rate for purposes of these payment terms.
    public readonly ?ValidityPeriod $ValidityPeriod; // [0..1]    The period during which these payment terms are valid.

    /**
     * @param PaymentMeansID[]|null $PaymentMeansID
     * @param Note[]|null           $Note
     */
    public function __construct(?ID $ID, ?array $PaymentMeansID, ?PrepaidPaymentReferenceID $PrepaidPaymentReferenceID, ?array $Note, ?ReferenceEventCode $ReferenceEventCode, ?SettlementDiscountPercent $SettlementDiscountPercent, ?PenaltySurchargePercent $PenaltySurchargePercent, ?PaymentPercent $PaymentPercent, ?Amount $Amount, ?SettlementDiscountAmount $SettlementDiscountAmount, ?PenaltyAmount $PenaltyAmount, ?PaymentTermsDetailsURI $PaymentTermsDetailsURI, ?PaymentDueDate $PaymentDueDate, ?InstallmentDueDate $InstallmentDueDate, ?InvoicingPartyReference $InvoicingPartyReference, ?SettlementPeriod $SettlementPeriod, ?PenaltyPeriod $PenaltyPeriod, ?ExchangeRate $ExchangeRate, ?ValidityPeriod $ValidityPeriod)
    {
        $this->ID = $ID;
        $this->PaymentMeansID = $PaymentMeansID;
        $this->PrepaidPaymentReferenceID = $PrepaidPaymentReferenceID;
        $this->Note = $Note;
        $this->ReferenceEventCode = $ReferenceEventCode;
        $this->SettlementDiscountPercent = $SettlementDiscountPercent;
        $this->PenaltySurchargePercent = $PenaltySurchargePercent;
        $this->PaymentPercent = $PaymentPercent;
        $this->Amount = $Amount;
        $this->SettlementDiscountAmount = $SettlementDiscountAmount;
        $this->PenaltyAmount = $PenaltyAmount;
        $this->PaymentTermsDetailsURI = $PaymentTermsDetailsURI;
        $this->PaymentDueDate = $PaymentDueDate;
        $this->InstallmentDueDate = $InstallmentDueDate;
        $this->InvoicingPartyReference = $InvoicingPartyReference;
        $this->SettlementPeriod = $SettlementPeriod;
        $this->PenaltyPeriod = $PenaltyPeriod;
        $this->ExchangeRate = $ExchangeRate;
        $this->ValidityPeriod = $ValidityPeriod;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->PaymentMeansID) {
            foreach ($this->PaymentMeansID as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PrepaidPaymentReferenceID) {
            $response[] = (string) $this->PrepaidPaymentReferenceID;
        }
        if ($this->Note) {
            foreach ($this->Note as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ReferenceEventCode) {
            $response[] = (string) $this->ReferenceEventCode;
        }
        if ($this->SettlementDiscountPercent) {
            $response[] = (string) $this->SettlementDiscountPercent;
        }
        if ($this->PenaltySurchargePercent) {
            $response[] = (string) $this->PenaltySurchargePercent;
        }
        if ($this->PaymentPercent) {
            $response[] = (string) $this->PaymentPercent;
        }
        if ($this->Amount) {
            $response[] = (string) $this->Amount;
        }
        if ($this->SettlementDiscountAmount) {
            $response[] = (string) $this->SettlementDiscountAmount;
        }
        if ($this->PenaltyAmount) {
            $response[] = (string) $this->PenaltyAmount;
        }
        if ($this->PaymentTermsDetailsURI) {
            $response[] = (string) $this->PaymentTermsDetailsURI;
        }
        if ($this->PaymentDueDate) {
            $response[] = (string) $this->PaymentDueDate;
        }
        if ($this->InstallmentDueDate) {
            $response[] = (string) $this->InstallmentDueDate;
        }
        if ($this->InvoicingPartyReference) {
            $response[] = (string) $this->InvoicingPartyReference;
        }
        if ($this->SettlementPeriod) {
            $response[] = (string) $this->SettlementPeriod;
        }
        if ($this->PenaltyPeriod) {
            $response[] = (string) $this->PenaltyPeriod;
        }
        if ($this->ExchangeRate) {
            $response[] = (string) $this->ExchangeRate;
        }
        if ($this->ValidityPeriod) {
            $response[] = (string) $this->ValidityPeriod;
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
