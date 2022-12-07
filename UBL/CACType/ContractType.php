<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\ContractDocumentReference;
use i3or1s\UBL\CAC\ContractualDelivery;
use i3or1s\UBL\CAC\NominationPeriod;
use i3or1s\UBL\CAC\ValidityPeriod;
use i3or1s\UBL\CBC\ContractTypeCode;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\IssueDate;
use i3or1s\UBL\CBC\IssueTime;
use i3or1s\UBL\CBC\NominationDate;
use i3or1s\UBL\CBC\NominationTime;
use i3or1s\UBL\CBC\Note;
use i3or1s\UBL\CBC\VersionID;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ContractType.html.
 */
abstract class ContractType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ContractType';

    public readonly ?ID $ID; // [0..1]    An identifier for this contract.
    public readonly ?IssueDate $IssueDate; // [0..1]    The date on which this contract was issued.
    public readonly ?IssueTime $IssueTime; // [0..1]    The time at which this contract was issued.
    public readonly ?NominationDate $NominationDate; // [0..1]    In a transportation contract, the deadline date by which the services referred to in the transport execution plan have to be booked. For example, if this service is a carrier service scheduled for Wednesday 16 February 2011 at 10 a.m. CET, the nomination date might be Tuesday15 February 2011.
    public readonly ?NominationTime $NominationTime; // [0..1]    In a transportation contract, the deadline time by which the services referred to in the transport execution plan have to be booked. For example, if this service is a carrier service scheduled for Wednesday 16 February 2011 at 10 a.m. CET, the nomination date might be Tuesday15 February 2011 and the nomination time 4 p.m. at the latest.
    public readonly ?ContractTypeCode $ContractTypeCode; // [0..1]    The type of this contract, expressed as a code, such as "Cost plus award fee" and "Cost plus fixed fee" from UNCEFACT Contract Type code list.
    public readonly ?\i3or1s\UBL\CBC\ContractType $ContractType; // [0..1]    The type of this contract, expressed as text, such as "Cost plus award fee" and "Cost plus fixed fee" from UNCEFACT Contract Type code list.
    /** @var Note[]|null */
    public readonly ?array $Note; // [0..*]    Free-form text conveying information that is not contained explicitly in other structures.
    public readonly ?VersionID $VersionID; // [0..1]    An identifier for the current version of this contract.
    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing this contract.
    public readonly ?ValidityPeriod $ValidityPeriod; // [0..1]    The period during which this contract is valid.
    /** @var ContractDocumentReference[]|null */
    public readonly ?array $ContractDocumentReference; // [0..*]    A reference to a contract document.
    public readonly ?NominationPeriod $NominationPeriod; // [0..1]    In a transportation contract, the period required to book the services specified in the contract before the services can begin.
    public readonly ?ContractualDelivery $ContractualDelivery; // [0..1]    In a transportation contract, the delivery of the services required to book the services specified in the contract.

    /**
     * @param Note[]|null                      $Note
     * @param Description[]|null               $Description
     * @param ContractDocumentReference[]|null $ContractDocumentReference
     */
    public function __construct(?ID $ID, ?IssueDate $IssueDate, ?IssueTime $IssueTime, ?NominationDate $NominationDate, ?NominationTime $NominationTime, ?ContractTypeCode $ContractTypeCode, ?\i3or1s\UBL\CBC\ContractType $ContractType, ?array $Note, ?VersionID $VersionID, ?array $Description, ?ValidityPeriod $ValidityPeriod, ?array $ContractDocumentReference, ?NominationPeriod $NominationPeriod, ?ContractualDelivery $ContractualDelivery)
    {
        $this->ID = $ID;
        $this->IssueDate = $IssueDate;
        $this->IssueTime = $IssueTime;
        $this->NominationDate = $NominationDate;
        $this->NominationTime = $NominationTime;
        $this->ContractTypeCode = $ContractTypeCode;
        $this->ContractType = $ContractType;
        $this->Note = $Note;
        $this->VersionID = $VersionID;
        $this->Description = $Description;
        $this->ValidityPeriod = $ValidityPeriod;
        $this->ContractDocumentReference = $ContractDocumentReference;
        $this->NominationPeriod = $NominationPeriod;
        $this->ContractualDelivery = $ContractualDelivery;
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
        if ($this->NominationDate) {
            $response[] = (string) $this->NominationDate;
        }
        if ($this->NominationTime) {
            $response[] = (string) $this->NominationTime;
        }
        if ($this->ContractTypeCode) {
            $response[] = (string) $this->ContractTypeCode;
        }
        if ($this->ContractType) {
            $response[] = (string) $this->ContractType;
        }
        if ($this->Note) {
            foreach ($this->Note as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->VersionID) {
            $response[] = (string) $this->VersionID;
        }
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ValidityPeriod) {
            $response[] = (string) $this->ValidityPeriod;
        }
        if ($this->ContractDocumentReference) {
            foreach ($this->ContractDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->NominationPeriod) {
            $response[] = (string) $this->NominationPeriod;
        }
        if ($this->ContractualDelivery) {
            $response[] = (string) $this->ContractualDelivery;
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
