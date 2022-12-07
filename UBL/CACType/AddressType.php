<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AddressLine;
use i3or1s\UBL\CAC\Country;
use i3or1s\UBL\CAC\LocationCoordinate;
use i3or1s\UBL\CBC\AdditionalStreetName;
use i3or1s\UBL\CBC\AddressFormatCode;
use i3or1s\UBL\CBC\AddressTypeCode;
use i3or1s\UBL\CBC\BlockName;
use i3or1s\UBL\CBC\BuildingName;
use i3or1s\UBL\CBC\BuildingNumber;
use i3or1s\UBL\CBC\CityName;
use i3or1s\UBL\CBC\CitySubdivisionName;
use i3or1s\UBL\CBC\CountrySubentity;
use i3or1s\UBL\CBC\CountrySubentityCode;
use i3or1s\UBL\CBC\Department;
use i3or1s\UBL\CBC\District;
use i3or1s\UBL\CBC\Floor;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\InhouseMail;
use i3or1s\UBL\CBC\MarkAttention;
use i3or1s\UBL\CBC\MarkCare;
use i3or1s\UBL\CBC\PlotIdentification;
use i3or1s\UBL\CBC\PostalZone;
use i3or1s\UBL\CBC\Postbox;
use i3or1s\UBL\CBC\Region;
use i3or1s\UBL\CBC\Room;
use i3or1s\UBL\CBC\StreetName;
use i3or1s\UBL\CBC\TimezoneOffset;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_AddressType.html.
 */
abstract class AddressType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:AddressType';

    public readonly ?ID $ID;    // [0..1]    An identifier for this address within an agreed scheme of address identifiers.
    public readonly ?AddressTypeCode $AddressTypeCode;  // [0..1]    A mutually agreed code signifying the type of this address.
    public readonly ?AddressFormatCode $AddressFormatCode;  // [0..1]    A mutually agreed code signifying the format of this address.
    public readonly ?Postbox $Postbox;  // [0..1]    A post office box number registered for postal delivery by a postal service provider.
    public readonly ?Floor $Floor;  // [0..1]    An identifiable floor of a building.
    public readonly ?Room $Room;    // [0..1]    An identifiable room, suite, or apartment of a building.
    public readonly ?StreetName $StreetName;    // [0..1]    The name of the street, road, avenue, way, etc. to which the number of the building is attached.
    public readonly ?AdditionalStreetName $AdditionalStreetName;    // [0..1]    An additional street name used to further clarify the address.
    public readonly ?BlockName $BlockName;  // [0..1]    The name of the block (an area surrounded by streets and usually containing several buildings) in which this address is located.
    public readonly ?BuildingName $BuildingName;    // [0..1]    The name of a building.
    public readonly ?BuildingNumber $BuildingNumber;    // [0..1]    The number of a building within the street.
    public readonly ?InhouseMail $InhouseMail;  // [0..1]    The specific identifable location within a building where mail is delivered.
    public readonly ?Department $Department;    // [0..1]    The department of the addressee.
    public readonly ?MarkAttention $MarkAttention;  // [0..1]    The name, expressed as text, of a person or department in an organization to whose attention incoming mail is directed; corresponds to the printed forms "for the attention of", "FAO", and ATTN:".
    public readonly ?MarkCare $MarkCare;    // [0..1]    The name, expressed as text, of a person or organization at this address into whose care incoming mail is entrusted; corresponds to the printed forms "care of" and "c/o".
    public readonly ?PlotIdentification $PlotIdentification;    // [0..1]    An identifier (e.g., a parcel number) for the piece of land associated with this address.
    public readonly ?CitySubdivisionName $CitySubdivisionName;  // [0..1]    The name of the subdivision of a city, town, or village in which this address is located, such as the name of its district or borough.
    public readonly ?CityName $CityName;    // [0..1]    The name of a city, town, or village.
    public readonly ?PostalZone $PostalZone;    // [0..1]    The postal identifier for this address according to the relevant national postal service, such as a ZIP code or Post Code.
    public readonly ?CountrySubentity $CountrySubentity;    // [0..1]    The political or administrative division of a country in which this address is located, such as the name of its county, province, or state, expressed as text.
    public readonly ?CountrySubentityCode $CountrySubentityCode;    // [0..1]    The political or administrative division of a country in which this address is located, such as a county, province, or state, expressed as a code (typically nationally agreed).
    public readonly ?Region $Region;    // [0..1]    The recognized geographic or economic region or group of countries in which this address is located.
    public readonly ?District $District;    // [0..1]    The district or geographical division of a country or region in which this address is located.
    public readonly ?TimezoneOffset $TimezoneOffset;    // [0..1]    The time zone in which this address is located (as an offset from Universal Coordinated Time (UTC)) at the time of exchange.
    /** @var AddressLine[]|null */
    public readonly ?array $AddressLine;  // [0..*]    An unstructured address line.
    public readonly ?Country $Country;  // [0..1]    The country in which this address is situated.
    /** @var LocationCoordinate[]|null */
    public readonly ?array $LocationCoordinate;    // [0..*]    The geographical coordinates of this address.

    /**
     * @param AddressLine[]|null        $AddressLine
     * @param LocationCoordinate[]|null $LocationCoordinate
     */
    public function __construct(?ID $ID, ?AddressTypeCode $AddressTypeCode, ?AddressFormatCode $AddressFormatCode, ?Postbox $Postbox, ?Floor $Floor, ?Room $Room, ?StreetName $StreetName, ?AdditionalStreetName $AdditionalStreetName, ?BlockName $BlockName, ?BuildingName $BuildingName, ?BuildingNumber $BuildingNumber, ?InhouseMail $InhouseMail, ?Department $Department, ?MarkAttention $MarkAttention, ?MarkCare $MarkCare, ?PlotIdentification $PlotIdentification, ?CitySubdivisionName $CitySubdivisionName, ?CityName $CityName, ?PostalZone $PostalZone, ?CountrySubentity $CountrySubentity, ?CountrySubentityCode $CountrySubentityCode, ?Region $Region, ?District $District, ?TimezoneOffset $TimezoneOffset, ?array $AddressLine, ?Country $Country, ?array $LocationCoordinate)
    {
        $this->ID = $ID;
        $this->AddressTypeCode = $AddressTypeCode;
        $this->AddressFormatCode = $AddressFormatCode;
        $this->Postbox = $Postbox;
        $this->Floor = $Floor;
        $this->Room = $Room;
        $this->StreetName = $StreetName;
        $this->AdditionalStreetName = $AdditionalStreetName;
        $this->BlockName = $BlockName;
        $this->BuildingName = $BuildingName;
        $this->BuildingNumber = $BuildingNumber;
        $this->InhouseMail = $InhouseMail;
        $this->Department = $Department;
        $this->MarkAttention = $MarkAttention;
        $this->MarkCare = $MarkCare;
        $this->PlotIdentification = $PlotIdentification;
        $this->CitySubdivisionName = $CitySubdivisionName;
        $this->CityName = $CityName;
        $this->PostalZone = $PostalZone;
        $this->CountrySubentity = $CountrySubentity;
        $this->CountrySubentityCode = $CountrySubentityCode;
        $this->Region = $Region;
        $this->District = $District;
        $this->TimezoneOffset = $TimezoneOffset;
        $this->AddressLine = $AddressLine;
        $this->Country = $Country;
        $this->LocationCoordinate = $LocationCoordinate;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->AddressTypeCode) {
            $response[] = (string) $this->AddressTypeCode;
        }
        if ($this->AddressFormatCode) {
            $response[] = (string) $this->AddressFormatCode;
        }
        if ($this->Postbox) {
            $response[] = (string) $this->Postbox;
        }
        if ($this->Floor) {
            $response[] = (string) $this->Floor;
        }
        if ($this->Room) {
            $response[] = (string) $this->Room;
        }
        if ($this->StreetName) {
            $response[] = (string) $this->StreetName;
        }
        if ($this->AdditionalStreetName) {
            $response[] = (string) $this->AdditionalStreetName;
        }
        if ($this->BlockName) {
            $response[] = (string) $this->BlockName;
        }
        if ($this->BuildingName) {
            $response[] = (string) $this->BuildingName;
        }
        if ($this->BuildingNumber) {
            $response[] = (string) $this->BuildingNumber;
        }
        if ($this->InhouseMail) {
            $response[] = (string) $this->InhouseMail;
        }
        if ($this->Department) {
            $response[] = (string) $this->Department;
        }
        if ($this->MarkAttention) {
            $response[] = (string) $this->MarkAttention;
        }
        if ($this->MarkCare) {
            $response[] = (string) $this->MarkCare;
        }
        if ($this->PlotIdentification) {
            $response[] = (string) $this->PlotIdentification;
        }
        if ($this->CitySubdivisionName) {
            $response[] = (string) $this->CitySubdivisionName;
        }
        if ($this->CityName) {
            $response[] = (string) $this->CityName;
        }
        if ($this->PostalZone) {
            $response[] = (string) $this->PostalZone;
        }
        if ($this->CountrySubentity) {
            $response[] = (string) $this->CountrySubentity;
        }
        if ($this->CountrySubentityCode) {
            $response[] = (string) $this->CountrySubentityCode;
        }
        if ($this->Region) {
            $response[] = (string) $this->Region;
        }
        if ($this->District) {
            $response[] = (string) $this->District;
        }
        if ($this->TimezoneOffset) {
            $response[] = (string) $this->TimezoneOffset;
        }

        if ($this->AddressLine) {
            foreach ($this->AddressLine as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Country) {
            $response[] = (string) $this->Country;
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
