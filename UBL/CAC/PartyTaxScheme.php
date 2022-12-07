<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\CompanyID;
use i3or1s\UBL\CBC\ExemptionReason;
use i3or1s\UBL\CBC\ExemptionReasonCode;
use i3or1s\UBL\CBC\RegistrationName;
use i3or1s\UBL\CBC\TaxLevelCode;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PartyTaxScheme.html.
 */
final class PartyTaxScheme implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:PartyTaxScheme';

    public readonly ?RegistrationName $RegistrationName; // [0..1]    The name of the party as registered with the relevant fiscal authority.
    public readonly ?CompanyID $CompanyID; // [0..1]    An identifier for the party assigned for tax purposes by the taxation authority.
    public readonly ?TaxLevelCode $TaxLevelCode; // [0..1]    A code signifying the tax level applicable to the party within this taxation scheme.
    public readonly ?ExemptionReasonCode $ExemptionReasonCode; // [0..1]    A reason for the party's exemption from tax, expressed as a code.
    /** @var ExemptionReason[]|null */
    public readonly ?array $ExemptionReason; // [0..*]    A reason for the party's exemption from tax, expressed as text.
    public readonly ?RegistrationAddress $RegistrationAddress; // [0..1]    The address of the party as registered for tax purposes.
    public readonly ?TaxScheme $TaxScheme; // [1..1]    The taxation scheme applicable to the party.

    /**
     * @param ExemptionReason[]|null $ExemptionReason
     */
    public function __construct(?RegistrationName $RegistrationName, ?CompanyID $CompanyID, ?TaxLevelCode $TaxLevelCode, ?ExemptionReasonCode $ExemptionReasonCode, ?array $ExemptionReason, ?RegistrationAddress $RegistrationAddress, ?TaxScheme $TaxScheme)
    {
        $this->RegistrationName = $RegistrationName;
        $this->CompanyID = $CompanyID;
        $this->TaxLevelCode = $TaxLevelCode;
        $this->ExemptionReasonCode = $ExemptionReasonCode;
        $this->ExemptionReason = $ExemptionReason;
        $this->RegistrationAddress = $RegistrationAddress;
        $this->TaxScheme = $TaxScheme;
    }

    public function __toString()
    {
        $response = [];
        if ($this->RegistrationName) {
            $response[] = (string) $this->RegistrationName;
        }
        if ($this->CompanyID) {
            $response[] = (string) $this->CompanyID;
        }
        if ($this->TaxLevelCode) {
            $response[] = (string) $this->TaxLevelCode;
        }
        if ($this->ExemptionReasonCode) {
            $response[] = (string) $this->ExemptionReasonCode;
        }
        if ($this->ExemptionReason) {
            foreach ($this->ExemptionReason as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->RegistrationAddress) {
            $response[] = (string) $this->RegistrationAddress;
        }
        $response[] = (string) $this->TaxScheme;

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
