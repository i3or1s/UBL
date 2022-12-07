<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\HazardousRegulationCode;
use i3or1s\UBL\CBC\InhalationToxicityZoneCode;
use i3or1s\UBL\CBC\PackingCriteriaCode;
use i3or1s\UBL\CBC\TransportAuthorizationCode;
use i3or1s\UBL\CBC\TransportEmergencyCardCode;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_HazardousGoodsTransit.html.
 */
final class HazardousGoodsTransit implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:HazardousGoodsTransit';

    public readonly ?TransportEmergencyCardCode $TransportEmergencyCardCode; // [0..1]    An identifier for a transport emergency card describing the actions to be taken in an emergency in transporting the hazardous goods. It may be the identity number of a hazardous emergency response plan assigned by the appropriate authority.
    public readonly ?PackingCriteriaCode $PackingCriteriaCode; // [0..1]    A code signifying the packaging requirement for transportation of the hazardous goods as assigned by IATA, IMDB, ADR, RID etc.
    public readonly ?HazardousRegulationCode $HazardousRegulationCode; // [0..1]    A code signifying the set of legal regulations governing the transportation of the hazardous goods.
    public readonly ?InhalationToxicityZoneCode $InhalationToxicityZoneCode; // [0..1]    A code signifying the Inhalation Toxicity Hazard Zone for the hazardous goods, as defined by the US Department of Transportation.
    public readonly ?TransportAuthorizationCode $TransportAuthorizationCode; // [0..1]    A code signifying authorization for the transportation of hazardous cargo.
    public readonly ?MaximumTemperature $MaximumTemperature; // [0..1]    The maximum temperature at which the hazardous goods can safely be transported.
    public readonly ?MinimumTemperature $MinimumTemperature; // [0..1]    The minimum temperature at which the hazardous goods can safely be transported.

    public function __construct(?TransportEmergencyCardCode $TransportEmergencyCardCode, ?PackingCriteriaCode $PackingCriteriaCode, ?HazardousRegulationCode $HazardousRegulationCode, ?InhalationToxicityZoneCode $InhalationToxicityZoneCode, ?TransportAuthorizationCode $TransportAuthorizationCode, ?MaximumTemperature $MaximumTemperature, ?MinimumTemperature $MinimumTemperature)
    {
        $this->TransportEmergencyCardCode = $TransportEmergencyCardCode;
        $this->PackingCriteriaCode = $PackingCriteriaCode;
        $this->HazardousRegulationCode = $HazardousRegulationCode;
        $this->InhalationToxicityZoneCode = $InhalationToxicityZoneCode;
        $this->TransportAuthorizationCode = $TransportAuthorizationCode;
        $this->MaximumTemperature = $MaximumTemperature;
        $this->MinimumTemperature = $MinimumTemperature;
    }

    public function __toString()
    {
        $response = [];
        if ($this->TransportEmergencyCardCode) {
            $response[] = (string) $this->TransportEmergencyCardCode;
        }
        if ($this->PackingCriteriaCode) {
            $response[] = (string) $this->PackingCriteriaCode;
        }
        if ($this->HazardousRegulationCode) {
            $response[] = (string) $this->HazardousRegulationCode;
        }
        if ($this->InhalationToxicityZoneCode) {
            $response[] = (string) $this->InhalationToxicityZoneCode;
        }
        if ($this->TransportAuthorizationCode) {
            $response[] = (string) $this->TransportAuthorizationCode;
        }
        if ($this->MaximumTemperature) {
            $response[] = (string) $this->MaximumTemperature;
        }
        if ($this->MinimumTemperature) {
            $response[] = (string) $this->MinimumTemperature;
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
