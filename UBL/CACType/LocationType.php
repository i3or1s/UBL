<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\Address;
use i3or1s\UBL\CAC\LocationCoordinate;
use i3or1s\UBL\CAC\SubsidiaryLocation;
use i3or1s\UBL\CAC\ValidityPeriod;
use i3or1s\UBL\CBC\Conditions;
use i3or1s\UBL\CBC\CountrySubentity;
use i3or1s\UBL\CBC\CountrySubentityCode;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\InformationURI;
use i3or1s\UBL\CBC\LocationTypeCode;
use i3or1s\UBL\CBC\Name;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_LocationType.html.
 */
abstract class LocationType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:LocationType';

    public readonly ?ID $ID; // [0..1]    An identifier for this location, e.g., the EAN Location Number, GLN.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing this location.
    /** @var Conditions[]|null */
    public readonly ?array $Conditions; // [0..*]    Free-form text describing the physical conditions of the location.
    public readonly ?CountrySubentity $CountrySubentity; // [0..1]    A territorial division of a country, such as a county or state, expressed as text.
    public readonly ?CountrySubentityCode $CountrySubentityCode; // [0..1]    A territorial division of a country, such as a county or state, expressed as a code.
    public readonly ?LocationTypeCode $LocationTypeCode; // [0..1]    A code signifying the type of location.
    public readonly ?InformationURI $InformationURI; // [0..1]    The Uniform Resource Identifier (URI) of a document providing information about this location.
    public readonly ?Name $Name; // [0..1]    The name of this location.
    public readonly ?ValidityPeriod $ValidityPeriod; // [0..*]    A period during which this location can be used (e.g., for delivery).
    public readonly ?Address $Address; // [0..1]    The address of this location.
    /** @var SubsidiaryLocation[]|null */
    public readonly ?array $SubsidiaryLocation; // [0..*]    A location subsidiary to this location.
    /** @var LocationCoordinate[]|null */
    public readonly ?array $LocationCoordinate; // [0..*]    The geographical coordinates of this location.

    /**
     * @param Description[]|null        $Description
     * @param Conditions[]|null         $Conditions
     * @param SubsidiaryLocation[]|null $SubsidiaryLocation
     * @param LocationCoordinate[]|null $LocationCoordinate
     */
    public function __construct(?ID $ID, ?array $Description, ?array $Conditions, ?CountrySubentity $CountrySubentity, ?CountrySubentityCode $CountrySubentityCode, ?LocationTypeCode $LocationTypeCode, ?InformationURI $InformationURI, ?Name $Name, ?ValidityPeriod $ValidityPeriod, ?Address $Address, ?array $SubsidiaryLocation, ?array $LocationCoordinate)
    {
        $this->ID = $ID;
        $this->Description = $Description;
        $this->Conditions = $Conditions;
        $this->CountrySubentity = $CountrySubentity;
        $this->CountrySubentityCode = $CountrySubentityCode;
        $this->LocationTypeCode = $LocationTypeCode;
        $this->InformationURI = $InformationURI;
        $this->Name = $Name;
        $this->ValidityPeriod = $ValidityPeriod;
        $this->Address = $Address;
        $this->SubsidiaryLocation = $SubsidiaryLocation;
        $this->LocationCoordinate = $LocationCoordinate;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->Description) {
            foreach ($this->Description as $desc) {
                $response[] = (string) $desc;
            }
        }
        if ($this->Conditions) {
            foreach ($this->Conditions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->CountrySubentity) {
            $response[] = (string) $this->CountrySubentity;
        }
        if ($this->CountrySubentityCode) {
            $response[] = (string) $this->CountrySubentityCode;
        }
        if ($this->LocationTypeCode) {
            $response[] = (string) $this->LocationTypeCode;
        }
        if ($this->InformationURI) {
            $response[] = (string) $this->InformationURI;
        }
        if ($this->Name) {
            $response[] = (string) $this->Name;
        }
        if ($this->ValidityPeriod) {
            $response[] = (string) $this->ValidityPeriod;
        }
        if ($this->Address) {
            $response[] = (string) $this->Address;
        }
        if ($this->SubsidiaryLocation) {
            foreach ($this->SubsidiaryLocation as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->LocationCoordinate) {
            foreach ($this->LocationCoordinate as $elem) {
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
