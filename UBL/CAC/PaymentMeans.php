<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\InstructionID;
use i3or1s\UBL\CBC\InstructionNote;
use i3or1s\UBL\CBC\PaymentChannelCode;
use i3or1s\UBL\CBC\PaymentDueDate;
use i3or1s\UBL\CBC\PaymentID;
use i3or1s\UBL\CBC\PaymentMeansCode;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PaymentMeans.html.
 */
final class PaymentMeans implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:PaymentMeans';

    public readonly ?ID $ID; // [0..1]    An identifier for this means of payment.
    public readonly PaymentMeansCode $PaymentMeansCode; // [1..1]    A code signifying the type of this means of payment.
    public readonly ?PaymentDueDate $PaymentDueDate; // [0..1]    The date on which payment is due for this means of payment.
    public readonly ?PaymentChannelCode $PaymentChannelCode; // [0..1]    A code signifying the payment channel for this means of payment.
    public readonly ?InstructionID $InstructionID; // [0..1]    An identifier for the payment instruction.
    /** @var InstructionNote[]|null */
    public readonly ?array $InstructionNote; // [0..*]    Free-form text conveying information that is not contained explicitly in other structures.
    /** @var PaymentID[]|null */
    public readonly ?array $PaymentID; // [0..*]    An identifier for a payment made using this means of payment.
    public readonly ?CardAccount $CardAccount; // [0..1]    A credit card, debit card, or charge card account that constitutes this means of payment.
    public readonly ?PayerFinancialAccount $PayerFinancialAccount; // [0..1]    The payer's financial account.
    public readonly ?PayeeFinancialAccount $PayeeFinancialAccount; // [0..1]    The payee's financial account.
    public readonly ?CreditAccount $CreditAccount; // [0..1]    A credit account associated with this means of payment.
    public readonly ?PaymentMandate $PaymentMandate; // [0..1]    The payment mandate associated with this means of payment.
    public readonly ?TradeFinancing $TradeFinancing; // [0..1]    A trade finance agreement applicable to this means of payment.

    /**
     * @param InstructionNote[]|null $InstructionNote
     * @param PaymentID[]|null       $PaymentID
     */
    public function __construct(?ID $ID, PaymentMeansCode $PaymentMeansCode, ?PaymentDueDate $PaymentDueDate, ?PaymentChannelCode $PaymentChannelCode, ?InstructionID $InstructionID, ?array $InstructionNote, ?array $PaymentID, ?CardAccount $CardAccount, ?PayerFinancialAccount $PayerFinancialAccount, ?PayeeFinancialAccount $PayeeFinancialAccount, ?CreditAccount $CreditAccount, ?PaymentMandate $PaymentMandate, ?TradeFinancing $TradeFinancing)
    {
        $this->ID = $ID;
        $this->PaymentMeansCode = $PaymentMeansCode;
        $this->PaymentDueDate = $PaymentDueDate;
        $this->PaymentChannelCode = $PaymentChannelCode;
        $this->InstructionID = $InstructionID;
        $this->InstructionNote = $InstructionNote;
        $this->PaymentID = $PaymentID;
        $this->CardAccount = $CardAccount;
        $this->PayerFinancialAccount = $PayerFinancialAccount;
        $this->PayeeFinancialAccount = $PayeeFinancialAccount;
        $this->CreditAccount = $CreditAccount;
        $this->PaymentMandate = $PaymentMandate;
        $this->TradeFinancing = $TradeFinancing;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        $response[] = (string) $this->PaymentMeansCode;
        if ($this->PaymentDueDate) {
            $response[] = (string) $this->PaymentDueDate;
        }
        if ($this->PaymentChannelCode) {
            $response[] = (string) $this->PaymentChannelCode;
        }
        if ($this->InstructionID) {
            $response[] = (string) $this->InstructionID;
        }
        if ($this->InstructionNote) {
            foreach ($this->InstructionNote as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PaymentID) {
            foreach ($this->PaymentID as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->CardAccount) {
            $response[] = (string) $this->CardAccount;
        }
        if ($this->PayerFinancialAccount) {
            $response[] = (string) $this->PayerFinancialAccount;
        }
        if ($this->PayeeFinancialAccount) {
            $response[] = (string) $this->PayeeFinancialAccount;
        }
        if ($this->CreditAccount) {
            $response[] = (string) $this->CreditAccount;
        }
        if ($this->PaymentMandate) {
            $response[] = (string) $this->PaymentMandate;
        }
        if ($this->TradeFinancing) {
            $response[] = (string) $this->TradeFinancing;
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
