<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\IssueDate;
use i3or1s\UBL\CBC\UUID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ProjectReferenceType.html.
 */
final class ProjectReference implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:ProjectReference';

    public readonly ID $ID; // [1..1]    An identifier for the referenced project.
    public readonly ?UUID $UUID; // [0..1]    A universally unique identifier for the referenced project.
    public readonly ?IssueDate $IssueDate; // [0..1]    The date on which the referenced project was issued.
    /** @var WorkPhaseReference[]|null */
    public readonly ?array $WorkPhaseReference; // [0..*]    A specific phase of work in the referenced project.

    /**
     * @param WorkPhaseReference[]|null $WorkPhaseReference
     */
    public function __construct(ID $ID, ?UUID $UUID, ?IssueDate $IssueDate, ?array $WorkPhaseReference)
    {
        $this->ID = $ID;
        $this->UUID = $UUID;
        $this->IssueDate = $IssueDate;
        $this->WorkPhaseReference = $WorkPhaseReference;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->ID;
        if ($this->UUID) {
            $response[] = (string) $this->UUID;
        }
        if ($this->IssueDate) {
            $response[] = (string) $this->IssueDate;
        }
        if ($this->WorkPhaseReference) {
            foreach ($this->WorkPhaseReference as $elem) {
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
