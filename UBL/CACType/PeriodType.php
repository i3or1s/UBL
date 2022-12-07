<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\DescriptionCode;
use i3or1s\UBL\CBC\DurationMeasure;
use i3or1s\UBL\CBC\EndDate;
use i3or1s\UBL\CBC\EndTime;
use i3or1s\UBL\CBC\StartDate;
use i3or1s\UBL\CBC\StartTime;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_PeriodType.html.
 */
abstract class PeriodType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:CodeType';

    public readonly ?StartDate $StartDate;  // [0..1]    The date on which this period begins.
    public readonly ?StartTime $StartTime;  // [0..1]    The time at which this period begins.
    public readonly ?EndDate $EndDate;  // [0..1]    The date on which this period ends.
    public readonly ?EndTime $EndTime;  // [0..1]    The time at which this period ends.
    public readonly ?DurationMeasure $DurationMeasure;  // [0..1]    The duration of this period, expressed as an ISO 8601 code.
    /** @var DescriptionCode[]|null */
    public readonly ?array $DescriptionCode;  // [0..*]    A description of this period, expressed as a code.
    /** @var Description[]|null */
    public readonly ?array $Description;  // [0..*]    A description of this period, expressed as text.

    /**
     * @param DescriptionCode[]|null $DescriptionCode
     * @param Description[]|null     $Description
     */
    public function __construct(?StartDate $StartDate, ?StartTime $StartTime, ?EndDate $EndDate, ?EndTime $EndTime, ?DurationMeasure $DurationMeasure, ?array $DescriptionCode, ?array $Description)
    {
        $this->StartDate = $StartDate;
        $this->StartTime = $StartTime;
        $this->EndDate = $EndDate;
        $this->EndTime = $EndTime;
        $this->DurationMeasure = $DurationMeasure;
        $this->DescriptionCode = $DescriptionCode;
        $this->Description = $Description;
    }

    public function __toString()
    {
        $response = [];
        if ($this->StartDate) {
            $response[] = (string) $this->StartDate;
        }
        if ($this->StartTime) {
            $response[] = (string) $this->StartTime;
        }
        if ($this->EndDate) {
            $response[] = (string) $this->EndDate;
        }
        if ($this->EndTime) {
            $response[] = (string) $this->EndTime;
        }
        if ($this->DurationMeasure) {
            $response[] = (string) $this->DurationMeasure;
        }
        if ($this->DescriptionCode) {
            foreach ($this->DescriptionCode as $descCode) {
                $response[] = (string) $descCode;
            }
        }
        if ($this->Description) {
            foreach ($this->Description as $desc) {
                $response[] = (string) $desc;
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
