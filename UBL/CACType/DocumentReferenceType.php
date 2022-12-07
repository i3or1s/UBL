<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\Attachment;
use i3or1s\UBL\CAC\IssuerParty;
use i3or1s\UBL\CAC\ResultOfVerification;
use i3or1s\UBL\CAC\ValidityPeriod;
use i3or1s\UBL\CBC\CopyIndicator;
use i3or1s\UBL\CBC\DocumentDescription;
use i3or1s\UBL\CBC\DocumentStatusCode;
use i3or1s\UBL\CBC\DocumentType;
use i3or1s\UBL\CBC\DocumentTypeCode;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\IssueDate;
use i3or1s\UBL\CBC\IssueTime;
use i3or1s\UBL\CBC\LanguageID;
use i3or1s\UBL\CBC\LocaleCode;
use i3or1s\UBL\CBC\UUID;
use i3or1s\UBL\CBC\VersionID;
use i3or1s\UBL\CBC\XPath;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_DocumentReferenceType.html.
 */
abstract class DocumentReferenceType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:DocumentReferenceType';

    public readonly ID $ID; // [1..1]    An identifier for the referenced document.
    public readonly ?CopyIndicator $CopyIndicator; // [0..1]    An indicator that the referenced document is a copy (true) or the original (false).
    public readonly ?UUID $UUID; // [0..1]    A universally unique identifier for this document reference.
    public readonly ?IssueDate $IssueDate; // [0..1]    The date, assigned by the sender of the referenced document, on which the document was issued.
    public readonly ?IssueTime $IssueTime; // [0..1]    The time, assigned by the sender of the referenced document, at which the document was issued.
    public readonly ?DocumentTypeCode $DocumentTypeCode; // [0..1]    The type of document being referenced, expressed as a code.
    public readonly ?DocumentType $DocumentType; // [0..1]    The type of document being referenced, expressed as text.
    /** @var XPath[]|null */
    public readonly ?array $XPath; // [0..*]    A reference to another place in the same XML document instance in which DocumentReference appears.
    public readonly ?LanguageID $LanguageID; // [0..1]    An identifier for the language used in the referenced document.
    public readonly ?LocaleCode $LocaleCode; // [0..1]    A code signifying the locale in which the language in the referenced document is used.
    public readonly ?VersionID $VersionID; // [0..1]    An identifier for the current version of the referenced document.
    public readonly ?DocumentStatusCode $DocumentStatusCode; // [0..1]    A code signifying the status of the reference document with respect to its original state.
    /** @var DocumentDescription[]|null */
    public readonly ?array $DocumentDescription; // [0..*]    Text describing the referenced document.
    public readonly ?Attachment $Attachment; // [0..1]    The referenced document as an attachment to the document from which it is referenced.
    public readonly ?ValidityPeriod $ValidityPeriod; // [0..1]    The period for which this document reference is valid.
    public readonly ?IssuerParty $IssuerParty; // [0..1]    The party who issued the referenced document.
    public readonly ?ResultOfVerification $ResultOfVerification; // [0..1]    The result of an attempt to verify a signature associated with the referenced document.

    /**
     * @param XPath[]|null               $XPath
     * @param DocumentDescription[]|null $DocumentDescription
     */
    public function __construct(ID $ID, ?CopyIndicator $CopyIndicator, ?UUID $UUID, ?IssueDate $IssueDate, ?IssueTime $IssueTime, ?DocumentTypeCode $DocumentTypeCode, ?DocumentType $DocumentType, ?array $XPath, ?LanguageID $LanguageID, ?LocaleCode $LocaleCode, ?VersionID $VersionID, ?DocumentStatusCode $DocumentStatusCode, ?array $DocumentDescription, ?Attachment $Attachment, ?ValidityPeriod $ValidityPeriod, ?IssuerParty $IssuerParty, ?ResultOfVerification $ResultOfVerification)
    {
        $this->ID = $ID;
        $this->CopyIndicator = $CopyIndicator;
        $this->UUID = $UUID;
        $this->IssueDate = $IssueDate;
        $this->IssueTime = $IssueTime;
        $this->DocumentTypeCode = $DocumentTypeCode;
        $this->DocumentType = $DocumentType;
        $this->XPath = $XPath;
        $this->LanguageID = $LanguageID;
        $this->LocaleCode = $LocaleCode;
        $this->VersionID = $VersionID;
        $this->DocumentStatusCode = $DocumentStatusCode;
        $this->DocumentDescription = $DocumentDescription;
        $this->Attachment = $Attachment;
        $this->ValidityPeriod = $ValidityPeriod;
        $this->IssuerParty = $IssuerParty;
        $this->ResultOfVerification = $ResultOfVerification;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->CopyIndicator) {
            $response[] = (string) $this->CopyIndicator;
        }
        if ($this->UUID) {
            $response[] = (string) $this->UUID;
        }
        if ($this->IssueDate) {
            $response[] = (string) $this->IssueDate;
        }
        if ($this->IssueTime) {
            $response[] = (string) $this->IssueTime;
        }
        if ($this->DocumentTypeCode) {
            $response[] = (string) $this->DocumentTypeCode;
        }
        if ($this->DocumentType) {
            $response[] = (string) $this->DocumentType;
        }
        if ($this->XPath) {
            foreach ($this->XPath as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->LanguageID) {
            $response[] = (string) $this->LanguageID;
        }
        if ($this->LocaleCode) {
            $response[] = (string) $this->LocaleCode;
        }
        if ($this->VersionID) {
            $response[] = (string) $this->VersionID;
        }
        if ($this->DocumentStatusCode) {
            $response[] = (string) $this->DocumentStatusCode;
        }
        if ($this->DocumentDescription) {
            foreach ($this->DocumentDescription as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Attachment) {
            $response[] = (string) $this->Attachment;
        }
        if ($this->ValidityPeriod) {
            $response[] = (string) $this->ValidityPeriod;
        }
        if ($this->IssuerParty) {
            $response[] = (string) $this->IssuerParty;
        }
        if ($this->ResultOfVerification) {
            $response[] = (string) $this->ResultOfVerification;
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
