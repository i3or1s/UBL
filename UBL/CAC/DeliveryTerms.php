<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\Amount;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\LossRisk;
use i3or1s\UBL\CBC\LossRiskResponsibilityCode;
use i3or1s\UBL\CBC\SpecialTerms;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_DeliveryTerms.html.
 */
final class DeliveryTerms implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:DeliveryTerms';

    public readonly ?ID $ID; // [0..1]    An identifier for this description of delivery terms.
    /** @var SpecialTerms[]|null */
    public readonly ?array $SpecialTerms; // [0..*]    A description of any terms or conditions relating to the delivery items.
    public readonly ?LossRiskResponsibilityCode $LossRiskResponsibilityCode; // [0..1]    A code that identifies one of various responsibilities for loss risk in the execution of the delivery.
    /** @var LossRisk[]|null */
    public readonly ?array $LossRisk; // [0..*]    A description of responsibility for risk of loss in execution of the delivery, expressed as text.
    public readonly ?Amount $Amount; // [0..1]    The monetary amount covered by these delivery terms.
    public readonly ?DeliveryLocation $DeliveryLocation; // [0..1]    The location for the contracted delivery.
    public readonly ?AllowanceCharge $AllowanceCharge; // [0..1]    An allowance or charge covered by these delivery terms.

    /**
     * @param SpecialTerms[]|null $SpecialTerms
     * @param LossRisk[]|null     $LossRisk
     */
    public function __construct(?ID $ID, ?array $SpecialTerms, ?LossRiskResponsibilityCode $LossRiskResponsibilityCode, ?array $LossRisk, ?Amount $Amount, ?DeliveryLocation $DeliveryLocation, ?AllowanceCharge $AllowanceCharge)
    {
        $this->ID = $ID;
        $this->SpecialTerms = $SpecialTerms;
        $this->LossRiskResponsibilityCode = $LossRiskResponsibilityCode;
        $this->LossRisk = $LossRisk;
        $this->Amount = $Amount;
        $this->DeliveryLocation = $DeliveryLocation;
        $this->AllowanceCharge = $AllowanceCharge;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->SpecialTerms) {
            foreach ($this->SpecialTerms as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->LossRiskResponsibilityCode) {
            $response[] = (string) $this->LossRiskResponsibilityCode;
        }
        if ($this->LossRisk) {
            foreach ($this->LossRisk as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Amount) {
            $response[] = (string) $this->Amount;
        }
        if ($this->DeliveryLocation) {
            $response[] = (string) $this->DeliveryLocation;
        }
        if ($this->AllowanceCharge) {
            $response[] = (string) $this->AllowanceCharge;
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
