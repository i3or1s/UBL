<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\EndDate;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\ProgressPercent;
use i3or1s\UBL\CBC\StartDate;
use i3or1s\UBL\CBC\WorkPhase;
use i3or1s\UBL\CBC\WorkPhaseCode;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_WorkPhaseReference.html.
 */
final class WorkPhaseReference implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:WorkPhaseReference';

    public readonly ?ID $ID; // [0..1]    An identifier for this phase of work.
    public readonly ?WorkPhaseCode $WorkPhaseCode; // [0..1]    A code signifying this phase of work.
    public readonly ?WorkPhase $WorkPhase; // [0..*]    Text describing this phase of work.
    public readonly ?ProgressPercent $ProgressPercent; // [0..1]    The progress percentage of the work phase.
    public readonly ?StartDate $StartDate; // [0..1]    The date on which this phase of work begins.
    public readonly ?EndDate $EndDate; // [0..1]    The date on which this phase of work ends.
    /** @var WorkOrderDocumentReference[]|null */
    public readonly ?array $WorkOrderDocumentReference; // [0..*]    A reference to a document regarding the work order for the project in which this phase of work takes place.

    /**
     * @param WorkOrderDocumentReference[]|null $WorkOrderDocumentReference
     */
    public function __construct(?ID $ID, ?WorkPhaseCode $WorkPhaseCode, ?WorkPhase $WorkPhase, ?ProgressPercent $ProgressPercent, ?StartDate $StartDate, ?EndDate $EndDate, ?array $WorkOrderDocumentReference)
    {
        $this->ID = $ID;
        $this->WorkPhaseCode = $WorkPhaseCode;
        $this->WorkPhase = $WorkPhase;
        $this->ProgressPercent = $ProgressPercent;
        $this->StartDate = $StartDate;
        $this->EndDate = $EndDate;
        $this->WorkOrderDocumentReference = $WorkOrderDocumentReference;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->WorkPhaseCode) {
            $response[] = (string) $this->WorkPhaseCode;
        }
        if ($this->WorkPhase) {
            $response[] = (string) $this->WorkPhase;
        }
        if ($this->ProgressPercent) {
            $response[] = (string) $this->ProgressPercent;
        }
        if ($this->StartDate) {
            $response[] = (string) $this->StartDate;
        }
        if ($this->EndDate) {
            $response[] = (string) $this->EndDate;
        }
        if ($this->WorkOrderDocumentReference) {
            foreach ($this->WorkOrderDocumentReference as $elem) {
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
