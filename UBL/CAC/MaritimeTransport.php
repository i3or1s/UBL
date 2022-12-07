<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\GrossTonnageMeasure;
use i3or1s\UBL\CBC\NetTonnageMeasure;
use i3or1s\UBL\CBC\RadioCallSignID;
use i3or1s\UBL\CBC\ShipsRequirements;
use i3or1s\UBL\CBC\VesselID;
use i3or1s\UBL\CBC\VesselName;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_MaritimeTransport.html.
 */
final class MaritimeTransport implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:MaritimeTransport';

    public readonly ?VesselID $VesselID; // [0..1]    An identifier for a specific vessel.
    public readonly ?VesselName $VesselName; // [0..1]    The name of the vessel.
    public readonly ?RadioCallSignID $RadioCallSignID; // [0..1]    The radio call sign of the vessel.
    /** @var ShipsRequirements[]|null */
    public readonly ?array $ShipsRequirements; // [0..*]    Information about what services a vessel will require when it arrives at a port, such as refueling, maintenance, waste disposal etc.
    public readonly ?GrossTonnageMeasure $GrossTonnageMeasure; // [0..1]    Gross tonnage is calculated by measuring a ship's volume (from keel to funnel, to the outside of the hull framing) and applying a mathematical formula and is used to determine things such as a ship's manning regulations, safety rules, registration fees and port dues.
    public readonly ?NetTonnageMeasure $NetTonnageMeasure; // [0..1]    Net tonnage is calculated by measuring a ship's internal volume and applying a mathematical formula and is used to calculate the port duties.
    public readonly ?RegistryCertificateDocumentReference $RegistryCertificateDocumentReference; // [0..1]    The certificate issued to the ship by the ships registry in a given flag state.
    public readonly ?RegistryPortLocation $RegistryPortLocation; // [0..1]    The port in which a vessel is registered or permanently based

    /**
     * @param ShipsRequirements[]|null $ShipsRequirements
     */
    public function __construct(?VesselID $VesselID, ?VesselName $VesselName, ?RadioCallSignID $RadioCallSignID, ?array $ShipsRequirements, ?GrossTonnageMeasure $GrossTonnageMeasure, ?NetTonnageMeasure $NetTonnageMeasure, ?RegistryCertificateDocumentReference $RegistryCertificateDocumentReference, ?RegistryPortLocation $RegistryPortLocation)
    {
        $this->VesselID = $VesselID;
        $this->VesselName = $VesselName;
        $this->RadioCallSignID = $RadioCallSignID;
        $this->ShipsRequirements = $ShipsRequirements;
        $this->GrossTonnageMeasure = $GrossTonnageMeasure;
        $this->NetTonnageMeasure = $NetTonnageMeasure;
        $this->RegistryCertificateDocumentReference = $RegistryCertificateDocumentReference;
        $this->RegistryPortLocation = $RegistryPortLocation;
    }

    public function __toString()
    {
        $response = [];
        if ($this->VesselID) {
            $response[] = (string) $this->VesselID;
        }
        if ($this->VesselName) {
            $response[] = (string) $this->VesselName;
        }
        if ($this->RadioCallSignID) {
            $response[] = (string) $this->RadioCallSignID;
        }
        if ($this->ShipsRequirements) {
            foreach ($this->ShipsRequirements as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->GrossTonnageMeasure) {
            $response[] = (string) $this->GrossTonnageMeasure;
        }
        if ($this->NetTonnageMeasure) {
            $response[] = (string) $this->NetTonnageMeasure;
        }
        if ($this->RegistryCertificateDocumentReference) {
            $response[] = (string) $this->RegistryCertificateDocumentReference;
        }
        if ($this->RegistryPortLocation) {
            $response[] = (string) $this->RegistryPortLocation;
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
