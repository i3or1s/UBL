<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\CertificateType;
use i3or1s\UBL\CBC\CertificateTypeCode;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Remarks;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_Certificate.html.
 */
final class Certificate implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:Certificate';

    public readonly ID $ID; // [1..1]    An identifier for this certificate.
    public readonly CertificateTypeCode $CertificateTypeCode; // [1..1]    The type of this certificate, expressed as a code. The type specifies what array it belongs to, e.g.. Environmental, security, health improvement etc.
    public readonly CertificateType $CertificateType; // [1..1]    The type of this certificate, expressed as a code. The type specifies what array it belongs to, e.g.. Environmental, security, health improvement etc.
    /** @var Remarks[]|null */
    public readonly ?array $Remarks; // [0..*]    Remarks by the applicant for this certificate.
    public readonly IssuerParty $IssuerParty; // [1..1]    The authorized organization that issued this certificate, the provider of the certificate.
    /** @var DocumentReference[]|null */
    public readonly ?array $DocumentReference; // [0..*]    A reference to a document relevant to this certificate or an application for this certificate.
    /** @var Signature[]|null */
    public readonly ?array $Signature; // [0..*]    A signature applied to this certificate.

    /**
     * @param Remarks[]|null           $Remarks
     * @param DocumentReference[]|null $DocumentReference
     * @param Signature[]|null         $Signature
     */
    public function __construct(ID $ID, CertificateTypeCode $CertificateTypeCode, CertificateType $CertificateType, ?array $Remarks, IssuerParty $IssuerParty, ?array $DocumentReference, ?array $Signature)
    {
        $this->ID = $ID;
        $this->CertificateTypeCode = $CertificateTypeCode;
        $this->CertificateType = $CertificateType;
        $this->Remarks = $Remarks;
        $this->IssuerParty = $IssuerParty;
        $this->DocumentReference = $DocumentReference;
        $this->Signature = $Signature;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        $response[] = (string) $this->CertificateTypeCode;
        $response[] = (string) $this->CertificateType;
        if ($this->Remarks) {
            foreach ($this->Remarks as $elem) {
                $response[] = (string) $elem;
            }
        }
        $response[] = (string) $this->IssuerParty;
        if ($this->DocumentReference) {
            foreach ($this->DocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Signature) {
            foreach ($this->Signature as $elem) {
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
