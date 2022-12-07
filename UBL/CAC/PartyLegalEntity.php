<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\CompanyID;
use i3or1s\UBL\CBC\CompanyLegalForm;
use i3or1s\UBL\CBC\CompanyLegalFormCode;
use i3or1s\UBL\CBC\CompanyLiquidationStatusCode;
use i3or1s\UBL\CBC\CorporateStockAmount;
use i3or1s\UBL\CBC\FullyPaidSharesIndicator;
use i3or1s\UBL\CBC\RegistrationDate;
use i3or1s\UBL\CBC\RegistrationExpirationDate;
use i3or1s\UBL\CBC\RegistrationName;
use i3or1s\UBL\CBC\SoleProprietorshipIndicator;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PartyLegalEntity.html.
 */
final class PartyLegalEntity implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:PartyLegalEntity';

    public readonly ?RegistrationName $RegistrationName; // [0..1]    The name of the party as registered with the relevant legal authority.
    public readonly ?CompanyID $CompanyID; // [0..1]    An identifier for the party as registered within a company registration scheme.
    public readonly ?RegistrationDate $RegistrationDate; // [0..1]    The registration date of the CompanyID.
    public readonly ?RegistrationExpirationDate $RegistrationExpirationDate; // [0..1]    The date upon which a registration expires (e.g., registration for an import/export license).
    public readonly ?CompanyLegalFormCode $CompanyLegalFormCode; // [0..1]    A code signifying the party's legal status.
    public readonly ?CompanyLegalForm $CompanyLegalForm; // [0..1]    The company legal status, expressed as a text.
    public readonly ?SoleProprietorshipIndicator $SoleProprietorshipIndicator; // [0..1]    An indicator that the company is owned and controlled by one person (true) or not (false).
    public readonly ?CompanyLiquidationStatusCode $CompanyLiquidationStatusCode; // [0..1]    A code signifying the party's liquidation status.
    public readonly ?CorporateStockAmount $CorporateStockAmount; // [0..1]    The number of shares in the capital stock of a corporation.
    public readonly ?FullyPaidSharesIndicator $FullyPaidSharesIndicator; // [0..1]    An indicator that all shares of corporate stock have been paid by shareholders (true) or not (false).
    public readonly ?RegistrationAddress $RegistrationAddress; // [0..1]    The registered address of the party within a corporate registration scheme.
    public readonly ?CorporateRegistrationScheme $CorporateRegistrationScheme; // [0..1]    The corporate registration scheme used to register the party.
    public readonly ?HeadOfficeParty $HeadOfficeParty; // [0..1]    The head office of the legal entity
    /** @var ShareholderParty[]|null */
    public readonly ?array $ShareholderParty; // [0..*]    A party owning shares in this legal entity.

    /**
     * @param ShareholderParty[]|null $ShareholderParty
     */
    public function __construct(?RegistrationName $RegistrationName, ?CompanyID $CompanyID, ?RegistrationDate $RegistrationDate, ?RegistrationExpirationDate $RegistrationExpirationDate, ?CompanyLegalFormCode $CompanyLegalFormCode, ?CompanyLegalForm $CompanyLegalForm, ?SoleProprietorshipIndicator $SoleProprietorshipIndicator, ?CompanyLiquidationStatusCode $CompanyLiquidationStatusCode, ?CorporateStockAmount $CorporateStockAmount, ?FullyPaidSharesIndicator $FullyPaidSharesIndicator, ?RegistrationAddress $RegistrationAddress, ?CorporateRegistrationScheme $CorporateRegistrationScheme, ?HeadOfficeParty $HeadOfficeParty, ?array $ShareholderParty)
    {
        $this->RegistrationName = $RegistrationName;
        $this->CompanyID = $CompanyID;
        $this->RegistrationDate = $RegistrationDate;
        $this->RegistrationExpirationDate = $RegistrationExpirationDate;
        $this->CompanyLegalFormCode = $CompanyLegalFormCode;
        $this->CompanyLegalForm = $CompanyLegalForm;
        $this->SoleProprietorshipIndicator = $SoleProprietorshipIndicator;
        $this->CompanyLiquidationStatusCode = $CompanyLiquidationStatusCode;
        $this->CorporateStockAmount = $CorporateStockAmount;
        $this->FullyPaidSharesIndicator = $FullyPaidSharesIndicator;
        $this->RegistrationAddress = $RegistrationAddress;
        $this->CorporateRegistrationScheme = $CorporateRegistrationScheme;
        $this->HeadOfficeParty = $HeadOfficeParty;
        $this->ShareholderParty = $ShareholderParty;
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
        if ($this->RegistrationDate) {
            $response[] = (string) $this->RegistrationDate;
        }
        if ($this->RegistrationExpirationDate) {
            $response[] = (string) $this->RegistrationExpirationDate;
        }
        if ($this->CompanyLegalFormCode) {
            $response[] = (string) $this->CompanyLegalFormCode;
        }
        if ($this->CompanyLegalForm) {
            $response[] = (string) $this->CompanyLegalForm;
        }
        if ($this->SoleProprietorshipIndicator) {
            $response[] = (string) $this->SoleProprietorshipIndicator;
        }
        if ($this->CompanyLiquidationStatusCode) {
            $response[] = (string) $this->CompanyLiquidationStatusCode;
        }
        if ($this->CorporateStockAmount) {
            $response[] = (string) $this->CorporateStockAmount;
        }
        if ($this->FullyPaidSharesIndicator) {
            $response[] = (string) $this->FullyPaidSharesIndicator;
        }
        if ($this->RegistrationAddress) {
            $response[] = (string) $this->RegistrationAddress;
        }
        if ($this->CorporateRegistrationScheme) {
            $response[] = (string) $this->CorporateRegistrationScheme;
        }
        if ($this->HeadOfficeParty) {
            $response[] = (string) $this->HeadOfficeParty;
        }
        if ($this->ShareholderParty) {
            foreach ($this->ShareholderParty as $elem) {
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
