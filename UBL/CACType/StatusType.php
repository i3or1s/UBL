<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\Condition;
use i3or1s\UBL\CBC\ConditionCode;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\IndicationIndicator;
use i3or1s\UBL\CBC\Percent;
use i3or1s\UBL\CBC\ReferenceDate;
use i3or1s\UBL\CBC\ReferenceTime;
use i3or1s\UBL\CBC\ReliabilityPercent;
use i3or1s\UBL\CBC\SequenceID;
use i3or1s\UBL\CBC\StatusReason;
use i3or1s\UBL\CBC\StatusReasonCode;
use i3or1s\UBL\CBC\Text;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_StatusType.html.
 */
abstract class StatusType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:StatusType';

    public readonly ?ConditionCode $ConditionCode; // [0..1]    Specifies the status condition of the related object.
    public readonly ?ReferenceDate $ReferenceDate; // [0..1]    The reference date for this status.
    public readonly ?ReferenceTime $ReferenceTime; // [0..1]    The reference time for this status.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing this status.
    public readonly ?StatusReasonCode $StatusReasonCode; // [0..1]    The reason for this status condition or position, expressed as a code.
    /** @var StatusReason[]|null */
    public readonly ?array $StatusReason; // [0..*]    The reason for this status condition or position, expressed as text.
    public readonly ?SequenceID $SequenceID; // [0..1]    A sequence identifier for this status.
    /** @var Text[]|null */
    public readonly ?array $Text; // [0..*]    Provides any textual information related to this status.
    public readonly ?IndicationIndicator $IndicationIndicator; // [0..1]    Specifies an indicator relevant to a specific status.
    public readonly ?Percent $Percent; // [0..1]    A percentage meaningful in the context of this status.
    public readonly ?ReliabilityPercent $ReliabilityPercent; // [0..1]    The reliability of this status, expressed as a percentage.
    /** @var Condition[]|null */
    public readonly ?array $Condition; // [0..*]    Measurements that quantify the condition of the objects covered by the status.

    /**
     * @param Description[]|null  $Description
     * @param StatusReason[]|null $StatusReason
     * @param Text[]|null         $Text
     * @param Condition[]|null    $Condition
     */
    public function __construct(?ConditionCode $ConditionCode, ?ReferenceDate $ReferenceDate, ?ReferenceTime $ReferenceTime, ?array $Description, ?StatusReasonCode $StatusReasonCode, ?array $StatusReason, ?SequenceID $SequenceID, ?array $Text, ?IndicationIndicator $IndicationIndicator, ?Percent $Percent, ?ReliabilityPercent $ReliabilityPercent, ?array $Condition)
    {
        $this->ConditionCode = $ConditionCode;
        $this->ReferenceDate = $ReferenceDate;
        $this->ReferenceTime = $ReferenceTime;
        $this->Description = $Description;
        $this->StatusReasonCode = $StatusReasonCode;
        $this->StatusReason = $StatusReason;
        $this->SequenceID = $SequenceID;
        $this->Text = $Text;
        $this->IndicationIndicator = $IndicationIndicator;
        $this->Percent = $Percent;
        $this->ReliabilityPercent = $ReliabilityPercent;
        $this->Condition = $Condition;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ConditionCode) {
            $response[] = (string) $this->ConditionCode;
        }
        if ($this->ReferenceDate) {
            $response[] = (string) $this->ReferenceDate;
        }
        if ($this->ReferenceTime) {
            $response[] = (string) $this->ReferenceTime;
        }
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->StatusReasonCode) {
            $response[] = (string) $this->StatusReasonCode;
        }
        if ($this->StatusReason) {
            foreach ($this->StatusReason as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->SequenceID) {
            $response[] = (string) $this->SequenceID;
        }
        if ($this->Text) {
            foreach ($this->Text as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->IndicationIndicator) {
            $response[] = (string) $this->IndicationIndicator;
        }
        if ($this->Percent) {
            $response[] = (string) $this->Percent;
        }
        if ($this->ReliabilityPercent) {
            $response[] = (string) $this->ReliabilityPercent;
        }
        if ($this->Condition) {
            foreach ($this->Condition as $elem) {
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
