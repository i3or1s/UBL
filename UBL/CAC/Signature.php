<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\CanonicalizationMethod;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Note;
use i3or1s\UBL\CBC\SignatureMethod;
use i3or1s\UBL\CBC\ValidationDate;
use i3or1s\UBL\CBC\ValidationTime;
use i3or1s\UBL\CBC\ValidatorID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Signature.html.
 */
final class Signature implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:Signature';

    public readonly ID $ID; // [1..1]    An identifier for this signature.
    /** @var Note[]|null */
    public readonly ?array $Note; // [0..*]    Free-form text conveying information that is not contained explicitly in other structures; in particular, information regarding the circumstances in which the signature is being used.
    public readonly ?ValidationDate $ValidationDate; // [0..1]    The date upon which this signature was verified.
    public readonly ?ValidationTime $ValidationTime; // [0..1]    The time at which this signature was verified.
    public readonly ?ValidatorID $ValidatorID; // [0..1]    An identifier for the organization, person, service, or server that verified this signature.
    public readonly ?CanonicalizationMethod $CanonicalizationMethod; // [0..1]    The method used to perform XML canonicalization of this signature.
    public readonly ?SignatureMethod $SignatureMethod; // [0..1]    Text describing the method of signature.
    public readonly ?SignatoryParty $SignatoryParty; // [0..1]    The signing party.
    public readonly ?DigitalSignatureAttachment $DigitalSignatureAttachment; // [0..1]    The actual encoded signature (e.g., in XMLDsig format).
    public readonly ?OriginalDocumentReference $OriginalDocumentReference; // [0..1]    A reference to the document that the signature applies to. For evidentiary purposes, this may be the document image that the signatory party saw when applying their signature.

    /**
     * @param Note[]|null $Note
     */
    public function __construct(ID $ID, ?array $Note, ?ValidationDate $ValidationDate, ?ValidationTime $ValidationTime, ?ValidatorID $ValidatorID, ?CanonicalizationMethod $CanonicalizationMethod, ?SignatureMethod $SignatureMethod, ?SignatoryParty $SignatoryParty, ?DigitalSignatureAttachment $DigitalSignatureAttachment, ?OriginalDocumentReference $OriginalDocumentReference)
    {
        $this->ID = $ID;
        $this->Note = $Note;
        $this->ValidationDate = $ValidationDate;
        $this->ValidationTime = $ValidationTime;
        $this->ValidatorID = $ValidatorID;
        $this->CanonicalizationMethod = $CanonicalizationMethod;
        $this->SignatureMethod = $SignatureMethod;
        $this->SignatoryParty = $SignatoryParty;
        $this->DigitalSignatureAttachment = $DigitalSignatureAttachment;
        $this->OriginalDocumentReference = $OriginalDocumentReference;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->Note) {
            foreach ($this->Note as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ValidationDate) {
            $response[] = (string) $this->ValidationDate;
        }
        if ($this->ValidationTime) {
            $response[] = (string) $this->ValidationTime;
        }
        if ($this->ValidatorID) {
            $response[] = (string) $this->ValidatorID;
        }
        if ($this->CanonicalizationMethod) {
            $response[] = (string) $this->CanonicalizationMethod;
        }
        if ($this->SignatureMethod) {
            $response[] = (string) $this->SignatureMethod;
        }
        if ($this->SignatoryParty) {
            $response[] = (string) $this->SignatoryParty;
        }
        if ($this->DigitalSignatureAttachment) {
            $response[] = (string) $this->DigitalSignatureAttachment;
        }
        if ($this->OriginalDocumentReference) {
            $response[] = (string) $this->OriginalDocumentReference;
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
