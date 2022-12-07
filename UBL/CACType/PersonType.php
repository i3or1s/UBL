<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\Contact;
use i3or1s\UBL\CAC\FinancialAccount;
use i3or1s\UBL\CAC\IdentityDocumentReference;
use i3or1s\UBL\CAC\ResidenceAddress;
use i3or1s\UBL\CBC\BirthDate;
use i3or1s\UBL\CBC\BirthplaceName;
use i3or1s\UBL\CBC\FamilyName;
use i3or1s\UBL\CBC\FirstName;
use i3or1s\UBL\CBC\GenderCode;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\JobTitle;
use i3or1s\UBL\CBC\MiddleName;
use i3or1s\UBL\CBC\NameSuffix;
use i3or1s\UBL\CBC\NationalityID;
use i3or1s\UBL\CBC\OrganizationDepartment;
use i3or1s\UBL\CBC\OtherName;
use i3or1s\UBL\CBC\Title;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_PersonType.html.
 */
abstract class PersonType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:PersonType';

    public readonly ?ID $ID; // [0..1]    An identifier for this person.
    public readonly ?FirstName $FirstName; // [0..1]    This person's given name.
    public readonly ?FamilyName $FamilyName; // [0..1]    This person's family name.
    public readonly ?Title $Title; // [0..1]    This person's title of address (e.g., Mr, Ms, Dr, Sir).
    public readonly ?MiddleName $MiddleName; // [0..1]    This person's middle name(s) or initials.
    public readonly ?OtherName $OtherName; // [0..1]    This person's second family name.
    public readonly ?NameSuffix $NameSuffix; // [0..1]    A suffix to this person's name (e.g., PhD, OBE, Jr).
    public readonly ?JobTitle $JobTitle; // [0..1]    This person's job title (for a particular role) within an organization.
    public readonly ?NationalityID $NationalityID; // [0..1]    An identifier for this person's nationality.
    public readonly ?GenderCode $GenderCode; // [0..1]    A code (e.g., ISO 5218) signifying the gender of this person.
    public readonly ?BirthDate $BirthDate; // [0..1]    This person's date of birth.
    public readonly ?BirthplaceName $BirthplaceName; // [0..1]    The name of the place where this person was born, expressed as text.
    public readonly ?OrganizationDepartment $OrganizationDepartment; // [0..1]    The department or subdivision of an organization that this person belongs to (in a particular role).
    public readonly ?Contact $Contact; // [0..1]    Contact information for this person.
    public readonly ?FinancialAccount $FinancialAccount; // [0..1]    The financial account associated with this person.
    /** @var IdentityDocumentReference[]|null */
    public readonly ?array $IdentityDocumentReference; // [0..*]    A reference to a document that can precisely identify this person (e.g., a driver's license).
    public readonly ?ResidenceAddress $ResidenceAddress; // [0..1]    This person's address of residence.

    /**
     * @param IdentityDocumentReference[]|null $IdentityDocumentReference
     */
    public function __construct(?ID $ID, ?FirstName $FirstName, ?FamilyName $FamilyName, ?Title $Title, ?MiddleName $MiddleName, ?OtherName $OtherName, ?NameSuffix $NameSuffix, ?JobTitle $JobTitle, ?NationalityID $NationalityID, ?GenderCode $GenderCode, ?BirthDate $BirthDate, ?BirthplaceName $BirthplaceName, ?OrganizationDepartment $OrganizationDepartment, ?Contact $Contact, ?FinancialAccount $FinancialAccount, ?array $IdentityDocumentReference, ?ResidenceAddress $ResidenceAddress)
    {
        $this->ID = $ID;
        $this->FirstName = $FirstName;
        $this->FamilyName = $FamilyName;
        $this->Title = $Title;
        $this->MiddleName = $MiddleName;
        $this->OtherName = $OtherName;
        $this->NameSuffix = $NameSuffix;
        $this->JobTitle = $JobTitle;
        $this->NationalityID = $NationalityID;
        $this->GenderCode = $GenderCode;
        $this->BirthDate = $BirthDate;
        $this->BirthplaceName = $BirthplaceName;
        $this->OrganizationDepartment = $OrganizationDepartment;
        $this->Contact = $Contact;
        $this->FinancialAccount = $FinancialAccount;
        $this->IdentityDocumentReference = $IdentityDocumentReference;
        $this->ResidenceAddress = $ResidenceAddress;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->FirstName) {
            $response[] = (string) $this->FirstName;
        }
        if ($this->FamilyName) {
            $response[] = (string) $this->FamilyName;
        }
        if ($this->Title) {
            $response[] = (string) $this->Title;
        }
        if ($this->MiddleName) {
            $response[] = (string) $this->MiddleName;
        }
        if ($this->OtherName) {
            $response[] = (string) $this->OtherName;
        }
        if ($this->NameSuffix) {
            $response[] = (string) $this->NameSuffix;
        }
        if ($this->JobTitle) {
            $response[] = (string) $this->JobTitle;
        }
        if ($this->NationalityID) {
            $response[] = (string) $this->NationalityID;
        }
        if ($this->GenderCode) {
            $response[] = (string) $this->GenderCode;
        }
        if ($this->BirthDate) {
            $response[] = (string) $this->BirthDate;
        }
        if ($this->BirthplaceName) {
            $response[] = (string) $this->BirthplaceName;
        }
        if ($this->OrganizationDepartment) {
            $response[] = (string) $this->OrganizationDepartment;
        }
        if ($this->Contact) {
            $response[] = (string) $this->Contact;
        }
        if ($this->FinancialAccount) {
            $response[] = (string) $this->FinancialAccount;
        }
        if ($this->IdentityDocumentReference) {
            foreach ($this->IdentityDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ResidenceAddress) {
            $response[] = (string) $this->ResidenceAddress;
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
