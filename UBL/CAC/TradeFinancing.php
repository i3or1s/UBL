<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\FinancingInstrumentCode;
use i3or1s\UBL\CBC\ID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_TradeFinancing.html.
 */
final class TradeFinancing implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:TradeFinancing';

    public readonly ?ID $ID; // [0..1]    An identifier for this trade financing instrument.
    public readonly ?FinancingInstrumentCode $FinancingInstrumentCode; // [0..1]    A code signifying the type of this financing instrument.
    public readonly ?ContractDocumentReference $ContractDocumentReference; // [0..1]    A reference to a contract document.
    /** @var DocumentReference[]|null */
    public readonly ?array $DocumentReference; // [0..*]    A reference to a document associated with this trade financing instrument.
    public readonly FinancingParty $FinancingParty; // [1..1]    The financing party (bank or other enabled party).
    public readonly ?FinancingFinancialAccount $FinancingFinancialAccount; // [0..1]    An internal bank account used by the bank or its first agent to manage the line of credit granted to the financing requester.
    /** @var Clause[]|null */
    public readonly ?array $Clause; // [0..*]    A clause applicable to this trade financing instrument.

    /**
     * @param DocumentReference[]|null $DocumentReference
     * @param Clause[]|null            $Clause
     */
    public function __construct(?ID $ID, ?FinancingInstrumentCode $FinancingInstrumentCode, ?ContractDocumentReference $ContractDocumentReference, ?array $DocumentReference, FinancingParty $FinancingParty, ?FinancingFinancialAccount $FinancingFinancialAccount, ?array $Clause)
    {
        $this->ID = $ID;
        $this->FinancingInstrumentCode = $FinancingInstrumentCode;
        $this->ContractDocumentReference = $ContractDocumentReference;
        $this->DocumentReference = $DocumentReference;
        $this->FinancingParty = $FinancingParty;
        $this->FinancingFinancialAccount = $FinancingFinancialAccount;
        $this->Clause = $Clause;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->FinancingInstrumentCode) {
            $response[] = (string) $this->FinancingInstrumentCode;
        }
        if ($this->ContractDocumentReference) {
            $response[] = (string) $this->ContractDocumentReference;
        }
        if ($this->DocumentReference) {
            foreach ($this->DocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        $response[] = (string) $this->FinancingParty;
        if ($this->FinancingFinancialAccount) {
            $response[] = (string) $this->FinancingFinancialAccount;
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
