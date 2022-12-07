<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AdditionalTemperature;
use i3or1s\UBL\CAC\ContactParty;
use i3or1s\UBL\CAC\EmergencyTemperature;
use i3or1s\UBL\CAC\FlashpointTemperature;
use i3or1s\UBL\CAC\HazardousGoodsTransit;
use i3or1s\UBL\CAC\SecondaryHazard;
use i3or1s\UBL\CBC\AdditionalInformation;
use i3or1s\UBL\CBC\CategoryName;
use i3or1s\UBL\CBC\EmergencyProceduresCode;
use i3or1s\UBL\CBC\HazardClassID;
use i3or1s\UBL\CBC\HazardousCategoryCode;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\LowerOrangeHazardPlacardID;
use i3or1s\UBL\CBC\MarkingID;
use i3or1s\UBL\CBC\MedicalFirstAidGuideCode;
use i3or1s\UBL\CBC\NetVolumeMeasure;
use i3or1s\UBL\CBC\NetWeightMeasure;
use i3or1s\UBL\CBC\PlacardEndorsement;
use i3or1s\UBL\CBC\PlacardNotation;
use i3or1s\UBL\CBC\Quantity;
use i3or1s\UBL\CBC\TechnicalName;
use i3or1s\UBL\CBC\UNDGCode;
use i3or1s\UBL\CBC\UpperOrangeHazardPlacardID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_HazardousItemType.html.
 */
abstract class HazardousItemType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:HazardousItemType';

    public readonly ?ID $ID; // [0..1]    An identifier for this hazardous item.
    public readonly ?PlacardNotation $PlacardNotation; // [0..1]    Text of the placard notation corresponding to the hazard class of this hazardous item. Can also be the hazard identification number of the orange placard (upper part) required on the means of transport.
    public readonly ?PlacardEndorsement $PlacardEndorsement; // [0..1]    Text of the placard endorsement that is to be shown on the shipping papers for this hazardous item. Can also be used for the number of the orange placard (lower part) required on the means of transport.
    /** @var AdditionalInformation[]|null */
    public readonly ?array $AdditionalInformation; // [0..*]    Text providing further information about the hazardous substance.
    public readonly ?UNDGCode $UNDGCode; // [0..1]    The UN code for this kind of hazardous item.
    public readonly ?EmergencyProceduresCode $EmergencyProceduresCode; // [0..1]    A code signifying the emergency procedures for this hazardous item.
    public readonly ?MedicalFirstAidGuideCode $MedicalFirstAidGuideCode; // [0..1]    A code signifying a medical first aid guide appropriate to this hazardous item.
    public readonly ?TechnicalName $TechnicalName; // [0..1]    The full technical name of a specific hazardous substance contained in this goods item.
    public readonly ?CategoryName $CategoryName; // [0..1]    The name of the category of hazard that applies to the Item.
    public readonly ?HazardousCategoryCode $HazardousCategoryCode; // [0..1]    A code signifying a kind of hazard for a material.
    public readonly ?UpperOrangeHazardPlacardID $UpperOrangeHazardPlacardID; // [0..1]    The number for the upper part of the orange hazard placard required on the means of transport.
    public readonly ?LowerOrangeHazardPlacardID $LowerOrangeHazardPlacardID; // [0..1]    The number for the lower part of the orange hazard placard required on the means of transport.
    public readonly ?MarkingID $MarkingID; // [0..1]    An identifier to the marking of the Hazardous Item
    public readonly ?HazardClassID $HazardClassID; // [0..1]    An identifier for the hazard class applicable to this hazardous item as defined by the relevant regulation authority (e.g., the IMDG Class Number of the SOLAS Convention of IMO and the ADR/RID Class Number for the road/rail environment).
    public readonly ?NetWeightMeasure $NetWeightMeasure; // [0..1]    The net weight of this hazardous item, excluding packaging.
    public readonly ?NetVolumeMeasure $NetVolumeMeasure; // [0..1]    The volume of this hazardous item, excluding packaging and transport equipment.
    public readonly ?Quantity $Quantity; // [0..1]    The quantity of goods items in this hazardous item that are hazardous.
    public readonly ?ContactParty $ContactParty; // [0..1]    The individual, group, or body to be contacted in case of a hazardous incident associated with this item.
    /** @var SecondaryHazard[]|null */
    public readonly ?array $SecondaryHazard; // [0..*]    A secondary hazard associated with this hazardous item.
    /** @var HazardousGoodsTransit[]|null */
    public readonly ?array $HazardousGoodsTransit; // [0..*]    Information related to the transit of this kind of hazardous goods.
    public readonly ?EmergencyTemperature $EmergencyTemperature; // [0..1]    The threshold temperature at which emergency procedures apply in the handling of temperature-controlled goods.
    public readonly ?FlashpointTemperature $FlashpointTemperature; // [0..1]    The flashpoint temperature of this hazardous item; i.e., the lowest temperature at which vapors above a volatile combustible substance ignite in air when exposed to flame.
    /** @var AdditionalTemperature[]|null */
    public readonly ?array $AdditionalTemperature; // [0..*]    Another temperature relevant to the handling of this hazardous item.

    /**
     * @param AdditionalInformation[]|null $AdditionalInformation
     * @param SecondaryHazard[]|null       $SecondaryHazard
     * @param HazardousGoodsTransit[]|null $HazardousGoodsTransit
     * @param AdditionalTemperature[]|null $AdditionalTemperature
     */
    public function __construct(?ID $ID, ?PlacardNotation $PlacardNotation, ?PlacardEndorsement $PlacardEndorsement, ?array $AdditionalInformation, ?UNDGCode $UNDGCode, ?EmergencyProceduresCode $EmergencyProceduresCode, ?MedicalFirstAidGuideCode $MedicalFirstAidGuideCode, ?TechnicalName $TechnicalName, ?CategoryName $CategoryName, ?HazardousCategoryCode $HazardousCategoryCode, ?UpperOrangeHazardPlacardID $UpperOrangeHazardPlacardID, ?LowerOrangeHazardPlacardID $LowerOrangeHazardPlacardID, ?MarkingID $MarkingID, ?HazardClassID $HazardClassID, ?NetWeightMeasure $NetWeightMeasure, ?NetVolumeMeasure $NetVolumeMeasure, ?Quantity $Quantity, ?ContactParty $ContactParty, ?array $SecondaryHazard, ?array $HazardousGoodsTransit, ?EmergencyTemperature $EmergencyTemperature, ?FlashpointTemperature $FlashpointTemperature, ?array $AdditionalTemperature)
    {
        $this->ID = $ID;
        $this->PlacardNotation = $PlacardNotation;
        $this->PlacardEndorsement = $PlacardEndorsement;
        $this->AdditionalInformation = $AdditionalInformation;
        $this->UNDGCode = $UNDGCode;
        $this->EmergencyProceduresCode = $EmergencyProceduresCode;
        $this->MedicalFirstAidGuideCode = $MedicalFirstAidGuideCode;
        $this->TechnicalName = $TechnicalName;
        $this->CategoryName = $CategoryName;
        $this->HazardousCategoryCode = $HazardousCategoryCode;
        $this->UpperOrangeHazardPlacardID = $UpperOrangeHazardPlacardID;
        $this->LowerOrangeHazardPlacardID = $LowerOrangeHazardPlacardID;
        $this->MarkingID = $MarkingID;
        $this->HazardClassID = $HazardClassID;
        $this->NetWeightMeasure = $NetWeightMeasure;
        $this->NetVolumeMeasure = $NetVolumeMeasure;
        $this->Quantity = $Quantity;
        $this->ContactParty = $ContactParty;
        $this->SecondaryHazard = $SecondaryHazard;
        $this->HazardousGoodsTransit = $HazardousGoodsTransit;
        $this->EmergencyTemperature = $EmergencyTemperature;
        $this->FlashpointTemperature = $FlashpointTemperature;
        $this->AdditionalTemperature = $AdditionalTemperature;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->PlacardNotation) {
            $response[] = (string) $this->PlacardNotation;
        }
        if ($this->PlacardEndorsement) {
            $response[] = (string) $this->PlacardEndorsement;
        }
        if ($this->AdditionalInformation) {
            foreach ($this->AdditionalInformation as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->UNDGCode) {
            $response[] = (string) $this->UNDGCode;
        }
        if ($this->EmergencyProceduresCode) {
            $response[] = (string) $this->EmergencyProceduresCode;
        }
        if ($this->MedicalFirstAidGuideCode) {
            $response[] = (string) $this->MedicalFirstAidGuideCode;
        }
        if ($this->TechnicalName) {
            $response[] = (string) $this->TechnicalName;
        }
        if ($this->CategoryName) {
            $response[] = (string) $this->CategoryName;
        }
        if ($this->HazardousCategoryCode) {
            $response[] = (string) $this->HazardousCategoryCode;
        }
        if ($this->UpperOrangeHazardPlacardID) {
            $response[] = (string) $this->UpperOrangeHazardPlacardID;
        }
        if ($this->LowerOrangeHazardPlacardID) {
            $response[] = (string) $this->LowerOrangeHazardPlacardID;
        }
        if ($this->MarkingID) {
            $response[] = (string) $this->MarkingID;
        }
        if ($this->HazardClassID) {
            $response[] = (string) $this->HazardClassID;
        }
        if ($this->NetWeightMeasure) {
            $response[] = (string) $this->NetWeightMeasure;
        }
        if ($this->NetVolumeMeasure) {
            $response[] = (string) $this->NetVolumeMeasure;
        }
        if ($this->Quantity) {
            $response[] = (string) $this->Quantity;
        }
        if ($this->ContactParty) {
            $response[] = (string) $this->ContactParty;
        }
        if ($this->SecondaryHazard) {
            foreach ($this->SecondaryHazard as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->HazardousGoodsTransit) {
            foreach ($this->HazardousGoodsTransit as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->EmergencyTemperature) {
            $response[] = (string) $this->EmergencyTemperature;
        }
        if ($this->FlashpointTemperature) {
            $response[] = (string) $this->FlashpointTemperature;
        }
        if ($this->AdditionalTemperature) {
            foreach ($this->AdditionalTemperature as $elem) {
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
