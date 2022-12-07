<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AgentParty;
use i3or1s\UBL\CAC\Contact;
use i3or1s\UBL\CAC\FinancialAccount;
use i3or1s\UBL\CAC\Language;
use i3or1s\UBL\CAC\PartyIdentification;
use i3or1s\UBL\CAC\PartyLegalEntity;
use i3or1s\UBL\CAC\PartyName;
use i3or1s\UBL\CAC\PartyTaxScheme;
use i3or1s\UBL\CAC\Person;
use i3or1s\UBL\CAC\PhysicalLocation;
use i3or1s\UBL\CAC\PostalAddress;
use i3or1s\UBL\CAC\PowerOfAttorney;
use i3or1s\UBL\CAC\ServiceProviderParty;
use i3or1s\UBL\CBC\EndpointID;
use i3or1s\UBL\CBC\IndustryClassificationCode;
use i3or1s\UBL\CBC\LogoReferenceID;
use i3or1s\UBL\CBC\MarkAttentionIndicator;
use i3or1s\UBL\CBC\MarkCareIndicator;
use i3or1s\UBL\CBC\WebsiteURI;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_PartyType.html.
 */
abstract class PartyType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:PartyType';

    public readonly ?MarkCareIndicator $MarkCareIndicator;  // [0..1]    An indicator that this party is "care of" (c/o) (true) or not (false).
    public readonly ?MarkAttentionIndicator $MarkAttentionIndicator;    // [0..1]    An indicator that this party is "for the attention of" (FAO) (true) or not (false).
    public readonly ?WebsiteURI $WebsiteURI;    // [0..1]    The Uniform Resource Identifier (URI) that identifies this party's web site; i.e., the web site's Uniform Resource Locator (URL).
    public readonly ?LogoReferenceID $LogoReferenceID;  // [0..1]    An identifier for this party's logo.
    public readonly ?EndpointID $EndpointID;    // [0..1]    An identifier for the end point of the routing service (e.g., EAN Location Number, GLN).
    public readonly ?IndustryClassificationCode $IndustryClassificationCode;    // [0..1]    This party's Industry Classification Code.
    /** @var PartyIdentification[]|null */
    public readonly ?array $PartyIdentification;  // [0..*]    An identifier for this party.
    /** @var PartyName[]|null */
    public readonly ?array $PartyName;  // [0..*]    A name for this party.
    public readonly ?Language $Language;    // [0..1]    The language associated with this party.
    public readonly ?PostalAddress $PostalAddress;  // [0..1]    The party's postal address.
    public readonly ?PhysicalLocation $PhysicalLocation;    // [0..1]    The physical location of this party.
    /** @var PartyTaxScheme[]|null */
    public readonly ?array $PartyTaxScheme;    // [0..*]    A tax scheme applying to this party.
    /** @var PartyLegalEntity[]|null */
    public readonly ?array $PartyLegalEntity;    // [0..*]    A description of this party as a legal entity.
    public readonly ?Contact $Contact;  // [0..1]    The primary contact for this party.
    /** @var Person[]|null */
    public readonly ?array $Person;    // [0..*]    A person associated with this party.
    public readonly ?AgentParty $AgentParty;    // [0..1]    A party who acts as an agent for this party.
    /** @var ServiceProviderParty[]|null */
    public readonly ?array $ServiceProviderParty;    // [0..*]    A party providing a service to this party.
    /** @var PowerOfAttorney[]|null */
    public readonly ?array $PowerOfAttorney;  // [0..*]    A power of attorney associated with this party.
    public readonly ?FinancialAccount $FinancialAccount;    // [0..1]    The financial account associated with this party.

    /**
     * @param PartyIdentification[]|null  $PartyIdentification
     * @param PartyName[]|null            $PartyName
     * @param PartyTaxScheme[]|null       $PartyTaxScheme
     * @param PartyLegalEntity[]|null     $PartyLegalEntity
     * @param Person[]|null               $Person
     * @param ServiceProviderParty[]|null $ServiceProviderParty
     * @param PowerOfAttorney[]|null      $PowerOfAttorney
     */
    public function __construct(?MarkCareIndicator $MarkCareIndicator, ?MarkAttentionIndicator $MarkAttentionIndicator, ?WebsiteURI $WebsiteURI, ?LogoReferenceID $LogoReferenceID, ?EndpointID $EndpointID, ?IndustryClassificationCode $IndustryClassificationCode, ?array $PartyIdentification, ?array $PartyName, ?Language $Language, ?PostalAddress $PostalAddress, ?PhysicalLocation $PhysicalLocation, ?array $PartyTaxScheme, ?array $PartyLegalEntity, ?Contact $Contact, ?array $Person, ?AgentParty $AgentParty, ?array $ServiceProviderParty, ?array $PowerOfAttorney, ?FinancialAccount $FinancialAccount)
    {
        $this->MarkCareIndicator = $MarkCareIndicator;
        $this->MarkAttentionIndicator = $MarkAttentionIndicator;
        $this->WebsiteURI = $WebsiteURI;
        $this->LogoReferenceID = $LogoReferenceID;
        $this->EndpointID = $EndpointID;
        $this->IndustryClassificationCode = $IndustryClassificationCode;
        $this->PartyIdentification = $PartyIdentification;
        $this->PartyName = $PartyName;
        $this->Language = $Language;
        $this->PostalAddress = $PostalAddress;
        $this->PhysicalLocation = $PhysicalLocation;
        $this->PartyTaxScheme = $PartyTaxScheme;
        $this->PartyLegalEntity = $PartyLegalEntity;
        $this->Contact = $Contact;
        $this->Person = $Person;
        $this->AgentParty = $AgentParty;
        $this->ServiceProviderParty = $ServiceProviderParty;
        $this->PowerOfAttorney = $PowerOfAttorney;
        $this->FinancialAccount = $FinancialAccount;
    }

    public function __toString()
    {
        $response = [];
        if ($this->MarkCareIndicator) {
            $response[] = (string) $this->MarkCareIndicator;
        }
        if ($this->MarkAttentionIndicator) {
            $response[] = (string) $this->MarkAttentionIndicator;
        }
        if ($this->WebsiteURI) {
            $response[] = (string) $this->WebsiteURI;
        }
        if ($this->LogoReferenceID) {
            $response[] = (string) $this->LogoReferenceID;
        }
        if ($this->EndpointID) {
            $response[] = (string) $this->EndpointID;
        }
        if ($this->IndustryClassificationCode) {
            $response[] = (string) $this->IndustryClassificationCode;
        }
        if ($this->PartyIdentification) {
            foreach ($this->PartyIdentification as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PartyName) {
            foreach ($this->PartyName as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Language) {
            $response[] = (string) $this->Language;
        }
        if ($this->PostalAddress) {
            $response[] = (string) $this->PostalAddress;
        }
        if ($this->PhysicalLocation) {
            $response[] = (string) $this->PhysicalLocation;
        }
        if ($this->PartyTaxScheme) {
            foreach ($this->PartyTaxScheme as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PartyLegalEntity) {
            foreach ($this->PartyLegalEntity as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Contact) {
            $response[] = (string) $this->Contact;
        }
        if ($this->Person) {
            foreach ($this->Person as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->AgentParty) {
            $response[] = (string) $this->AgentParty;
        }
        if ($this->ServiceProviderParty) {
            foreach ($this->ServiceProviderParty as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PowerOfAttorney) {
            foreach ($this->PowerOfAttorney as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->FinancialAccount) {
            $response[] = (string) $this->FinancialAccount;
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
