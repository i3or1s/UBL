<?php

namespace i3or1s\UBL\CAC;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_BillingReference.html.
 */
final class BillingReference implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:BillingReference';

    public readonly ?InvoiceDocumentReference $InvoiceDocumentReference; // [0..1]    A reference to an invoice.
    public readonly ?SelfBilledInvoiceDocumentReference $SelfBilledInvoiceDocumentReference; // [0..1]    A reference to a self billed invoice.
    public readonly ?CreditNoteDocumentReference $CreditNoteDocumentReference; // [0..1]    A reference to a credit note.
    public readonly ?SelfBilledCreditNoteDocumentReference $SelfBilledCreditNoteDocumentReference; // [0..1]    A reference to a self billed credit note.
    public readonly ?DebitNoteDocumentReference $DebitNoteDocumentReference; // [0..1]    A reference to a debit note.
    public readonly ?ReminderDocumentReference $ReminderDocumentReference; // [0..1]    A reference to a billing reminder.
    public readonly ?AdditionalDocumentReference $AdditionalDocumentReference; // [0..1]    A reference to an additional document.
    /** @var BillingReferenceLine[]|null */
    public readonly ?array $BillingReferenceLine; // [0..*]    A reference to a transaction line in the billing document.

    /**
     * @param BillingReferenceLine[]|null $BillingReferenceLine
     */
    public function __construct(?InvoiceDocumentReference $InvoiceDocumentReference, ?SelfBilledInvoiceDocumentReference $SelfBilledInvoiceDocumentReference, ?CreditNoteDocumentReference $CreditNoteDocumentReference, ?SelfBilledCreditNoteDocumentReference $SelfBilledCreditNoteDocumentReference, ?DebitNoteDocumentReference $DebitNoteDocumentReference, ?ReminderDocumentReference $ReminderDocumentReference, ?AdditionalDocumentReference $AdditionalDocumentReference, ?array $BillingReferenceLine)
    {
        $this->InvoiceDocumentReference = $InvoiceDocumentReference;
        $this->SelfBilledInvoiceDocumentReference = $SelfBilledInvoiceDocumentReference;
        $this->CreditNoteDocumentReference = $CreditNoteDocumentReference;
        $this->SelfBilledCreditNoteDocumentReference = $SelfBilledCreditNoteDocumentReference;
        $this->DebitNoteDocumentReference = $DebitNoteDocumentReference;
        $this->ReminderDocumentReference = $ReminderDocumentReference;
        $this->AdditionalDocumentReference = $AdditionalDocumentReference;
        $this->BillingReferenceLine = $BillingReferenceLine;
    }

    public function __toString()
    {
        $response = [];
        if ($this->InvoiceDocumentReference) {
            $response[] = (string) $this->InvoiceDocumentReference;
        }
        if ($this->SelfBilledInvoiceDocumentReference) {
            $response[] = (string) $this->SelfBilledInvoiceDocumentReference;
        }
        if ($this->CreditNoteDocumentReference) {
            $response[] = (string) $this->CreditNoteDocumentReference;
        }
        if ($this->SelfBilledCreditNoteDocumentReference) {
            $response[] = (string) $this->SelfBilledCreditNoteDocumentReference;
        }
        if ($this->DebitNoteDocumentReference) {
            $response[] = (string) $this->DebitNoteDocumentReference;
        }
        if ($this->ReminderDocumentReference) {
            $response[] = (string) $this->ReminderDocumentReference;
        }
        if ($this->AdditionalDocumentReference) {
            $response[] = (string) $this->AdditionalDocumentReference;
        }
        if ($this->BillingReferenceLine) {
            foreach ($this->BillingReferenceLine as $desc) {
                $response[] = (string) $desc;
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
