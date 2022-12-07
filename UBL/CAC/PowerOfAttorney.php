<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\IssueDate;
use i3or1s\UBL\CBC\IssueTime;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_PowerOfAttorney.html.
 */
final class PowerOfAttorney implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:PowerOfAttorney';

    public readonly ?ID $ID; // [0..1]    An identifier for this power of attorney.
    public readonly ?IssueDate $IssueDate; // [0..1]    The date on which this power of attorney was issued.
    public readonly ?IssueTime $IssueTime; // [0..1]    The time at which this power of attorney was issued.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing this power of attorney.
    public readonly ?NotaryParty $NotaryParty; // [0..1]    The party notarizing this power of attorney.
    public readonly ?AgentParty $AgentParty; // [1..1]    The party who acts as an agent or fiduciary for the principal and who holds this power of attorney on behalf of the principal.
    /** @var WitnessParty[]|null */
    public readonly ?array $WitnessParty; // [0..*]    An association to a WitnessParty.
    /** @var MandateDocumentReference[]|null */
    public readonly ?array $MandateDocumentReference; // [0..*]    A reference to a mandate associated with this power of attorney.

    /**
     * @param Description[]|null              $Description
     * @param WitnessParty[]|null             $WitnessParty
     * @param MandateDocumentReference[]|null $MandateDocumentReference
     */
    public function __construct(?ID $ID, ?IssueDate $IssueDate, ?IssueTime $IssueTime, ?array $Description, ?NotaryParty $NotaryParty, ?AgentParty $AgentParty, ?array $WitnessParty, ?array $MandateDocumentReference)
    {
        $this->ID = $ID;
        $this->IssueDate = $IssueDate;
        $this->IssueTime = $IssueTime;
        $this->Description = $Description;
        $this->NotaryParty = $NotaryParty;
        $this->AgentParty = $AgentParty;
        $this->WitnessParty = $WitnessParty;
        $this->MandateDocumentReference = $MandateDocumentReference;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->IssueDate) {
            $response[] = (string) $this->IssueDate;
        }
        if ($this->IssueTime) {
            $response[] = (string) $this->IssueTime;
        }
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->NotaryParty) {
            $response[] = (string) $this->NotaryParty;
        }
        if ($this->AgentParty) {
            $response[] = (string) $this->AgentParty;
        }
        if ($this->WitnessParty) {
            foreach ($this->WitnessParty as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->MandateDocumentReference) {
            foreach ($this->MandateDocumentReference as $elem) {
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
