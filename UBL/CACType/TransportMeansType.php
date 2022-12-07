<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AirTransport;
use i3or1s\UBL\CAC\MaritimeTransport;
use i3or1s\UBL\CAC\MeasurementDimension;
use i3or1s\UBL\CAC\OwnerParty;
use i3or1s\UBL\CAC\RailTransport;
use i3or1s\UBL\CAC\RoadTransport;
use i3or1s\UBL\CAC\Stowage;
use i3or1s\UBL\CBC\DirectionCode;
use i3or1s\UBL\CBC\JourneyID;
use i3or1s\UBL\CBC\RegistrationNationality;
use i3or1s\UBL\CBC\RegistrationNationalityID;
use i3or1s\UBL\CBC\TradeServiceCode;
use i3or1s\UBL\CBC\TransportMeansTypeCode;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_TransportMeansType.html.
 */
abstract class TransportMeansType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:TransportMeansType';

    public readonly ?JourneyID $JourneyID; // [0..1]    An identifier for the regular service schedule of this means of transport.
    public readonly ?RegistrationNationalityID $RegistrationNationalityID; // [0..1]    An identifier for the country in which this means of transport is registered.
    /** @var RegistrationNationality[]|null */
    public readonly ?array $RegistrationNationality; // [0..*]    Text describing the country in which this means of transport is registered.
    public readonly ?DirectionCode $DirectionCode; // [0..1]    A code signifying the direction of this means of transport.
    public readonly ?TransportMeansTypeCode $TransportMeansTypeCode; // [0..1]    A code signifying the type of this means of transport (truck, vessel, etc.).
    public readonly ?TradeServiceCode $TradeServiceCode; // [0..1]    A code signifying the service regularly provided by the carrier operating this means of transport.
    public readonly ?Stowage $Stowage; // [0..1]    The location within the means of transport where goods are to be or have been stowed.
    public readonly ?AirTransport $AirTransport; // [0..1]    An aircraft used for transport.
    public readonly ?RoadTransport $RoadTransport; // [0..1]    A vehicle used for road transport.
    public readonly ?RailTransport $RailTransport; // [0..1]    Equipment used for rail transport.
    public readonly ?MaritimeTransport $MaritimeTransport; // [0..1]    A vessel used for transport by water (not only by sea).
    public readonly ?OwnerParty $OwnerParty; // [0..1]    The party that owns this means of transport.
    /** @var MeasurementDimension[]|null */
    public readonly ?array $MeasurementDimension; // [0..*]    A measurable dimension (length, mass, weight, or volume) of this means of transport.

    /**
     * @param RegistrationNationality[]|null $RegistrationNationality
     * @param MeasurementDimension[]|null    $MeasurementDimension
     */
    public function __construct(?JourneyID $JourneyID, ?RegistrationNationalityID $RegistrationNationalityID, ?array $RegistrationNationality, ?DirectionCode $DirectionCode, ?TransportMeansTypeCode $TransportMeansTypeCode, ?TradeServiceCode $TradeServiceCode, ?Stowage $Stowage, ?AirTransport $AirTransport, ?RoadTransport $RoadTransport, ?RailTransport $RailTransport, ?MaritimeTransport $MaritimeTransport, ?OwnerParty $OwnerParty, ?array $MeasurementDimension)
    {
        $this->JourneyID = $JourneyID;
        $this->RegistrationNationalityID = $RegistrationNationalityID;
        $this->RegistrationNationality = $RegistrationNationality;
        $this->DirectionCode = $DirectionCode;
        $this->TransportMeansTypeCode = $TransportMeansTypeCode;
        $this->TradeServiceCode = $TradeServiceCode;
        $this->Stowage = $Stowage;
        $this->AirTransport = $AirTransport;
        $this->RoadTransport = $RoadTransport;
        $this->RailTransport = $RailTransport;
        $this->MaritimeTransport = $MaritimeTransport;
        $this->OwnerParty = $OwnerParty;
        $this->MeasurementDimension = $MeasurementDimension;
    }

    public function __toString()
    {
        $response = [];
        if ($this->JourneyID) {
            $response[] = (string) $this->JourneyID;
        }
        if ($this->RegistrationNationalityID) {
            $response[] = (string) $this->RegistrationNationalityID;
        }
        if ($this->RegistrationNationality) {
            foreach ($this->RegistrationNationality as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->DirectionCode) {
            $response[] = (string) $this->DirectionCode;
        }
        if ($this->TransportMeansTypeCode) {
            $response[] = (string) $this->TransportMeansTypeCode;
        }
        if ($this->TradeServiceCode) {
            $response[] = (string) $this->TradeServiceCode;
        }
        if ($this->Stowage) {
            $response[] = (string) $this->Stowage;
        }
        if ($this->AirTransport) {
            $response[] = (string) $this->AirTransport;
        }
        if ($this->RoadTransport) {
            $response[] = (string) $this->RoadTransport;
        }
        if ($this->RailTransport) {
            $response[] = (string) $this->RailTransport;
        }
        if ($this->MaritimeTransport) {
            $response[] = (string) $this->MaritimeTransport;
        }
        if ($this->OwnerParty) {
            $response[] = (string) $this->OwnerParty;
        }
        if ($this->MeasurementDimension) {
            foreach ($this->MeasurementDimension as $elem) {
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
