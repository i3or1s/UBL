<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\MandateTypeCode;
use i3or1s\UBL\CBC\MaximumPaidAmount;
use i3or1s\UBL\CBC\MaximumPaymentInstructionsNumeric;
use i3or1s\UBL\CBC\SignatureID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PaymentMandate.html.
 */
final class PaymentMandate implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:PaymentMandate';

    public readonly ?ID $ID; // [0..1]    An identifier for this payment mandate.
    public readonly ?MandateTypeCode $MandateTypeCode; // [0..1]    A code signifying the type of this payment mandate.
    public readonly ?MaximumPaymentInstructionsNumeric $MaximumPaymentInstructionsNumeric; // [0..1]    The number of maximum payment instructions allowed within the validity period.
    public readonly ?MaximumPaidAmount $MaximumPaidAmount; // [0..1]    The maximum amount to be paid within a single instruction.
    public readonly ?SignatureID $SignatureID; // [0..1]    An identifier for a signature applied by a signatory party.
    public readonly ?PayerParty $PayerParty; // [0..1]    The payer party (if different from the debtor).
    public readonly ?PayerFinancialAccount $PayerFinancialAccount; // [0..1]    The payer's financial account.
    public readonly ?ValidityPeriod $ValidityPeriod; // [0..1]    The period during which this mandate is valid.
    public readonly ?PaymentReversalPeriod $PaymentReversalPeriod; // [0..1]    The period of the reverse payment.
    /** @var Clause[]|null */
    public readonly ?array $Clause; // [0..*]    A clause applicable to this payment mandate.

    /**
     * @param Clause[]|null $Clause
     */
    public function __construct(?ID $ID, ?MandateTypeCode $MandateTypeCode, ?MaximumPaymentInstructionsNumeric $MaximumPaymentInstructionsNumeric, ?MaximumPaidAmount $MaximumPaidAmount, ?SignatureID $SignatureID, ?PayerParty $PayerParty, ?PayerFinancialAccount $PayerFinancialAccount, ?ValidityPeriod $ValidityPeriod, ?PaymentReversalPeriod $PaymentReversalPeriod, ?array $Clause)
    {
        $this->ID = $ID;
        $this->MandateTypeCode = $MandateTypeCode;
        $this->MaximumPaymentInstructionsNumeric = $MaximumPaymentInstructionsNumeric;
        $this->MaximumPaidAmount = $MaximumPaidAmount;
        $this->SignatureID = $SignatureID;
        $this->PayerParty = $PayerParty;
        $this->PayerFinancialAccount = $PayerFinancialAccount;
        $this->ValidityPeriod = $ValidityPeriod;
        $this->PaymentReversalPeriod = $PaymentReversalPeriod;
        $this->Clause = $Clause;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->MandateTypeCode) {
            $response[] = (string) $this->MandateTypeCode;
        }
        if ($this->MaximumPaymentInstructionsNumeric) {
            $response[] = (string) $this->MaximumPaymentInstructionsNumeric;
        }
        if ($this->MaximumPaidAmount) {
            $response[] = (string) $this->MaximumPaidAmount;
        }
        if ($this->SignatureID) {
            $response[] = (string) $this->SignatureID;
        }
        if ($this->PayerParty) {
            $response[] = (string) $this->PayerParty;
        }
        if ($this->PayerFinancialAccount) {
            $response[] = (string) $this->PayerFinancialAccount;
        }
        if ($this->ValidityPeriod) {
            $response[] = (string) $this->ValidityPeriod;
        }
        if ($this->PaymentReversalPeriod) {
            $response[] = (string) $this->PaymentReversalPeriod;
        }
        if ($this->Clause) {
            foreach ($this->Clause as $elem) {
                $response[] = (string) $elem;
            }
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
