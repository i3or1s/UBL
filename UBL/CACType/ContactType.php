<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\OtherCommunication;
use i3or1s\UBL\CBC\ElectronicMail;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Name;
use i3or1s\UBL\CBC\Note;
use i3or1s\UBL\CBC\Telefax;
use i3or1s\UBL\CBC\Telephone;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ContactType.html.
 */
abstract class ContactType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ContactType';

    public readonly ?ID $ID; // [0..1]    An identifier for this contact.
    public readonly ?Name $Name; // [0..1]    The name of this contact. It is recommended that this be used for a functional name and not a personal name.
    public readonly ?Telephone $Telephone; // [0..1]    The primary telephone number of this contact.
    public readonly ?Telefax $Telefax; // [0..1]    The primary fax number of this contact.
    public readonly ?ElectronicMail $ElectronicMail; // [0..1]    The primary email address of this contact.
    /** @var Note[]|null */
    public readonly ?array $Note; // [0..*]    Free-form text conveying information that is not contained explicitly in other structures; in particular, a textual description of the circumstances under which this contact can be used (e.g., "emergency" or "after hours").
    /** @var OtherCommunication[]|null */
    public readonly ?array $OtherCommunication; // [0..*]    Another means of communication with this contact.

    /**
     * @param Note[]|null               $Note
     * @param OtherCommunication[]|null $OtherCommunication
     */
    public function __construct(?ID $ID, ?Name $Name, ?Telephone $Telephone, ?Telefax $Telefax, ?ElectronicMail $ElectronicMail, ?array $Note, ?array $OtherCommunication)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Telephone = $Telephone;
        $this->Telefax = $Telefax;
        $this->ElectronicMail = $ElectronicMail;
        $this->Note = $Note;
        $this->OtherCommunication = $OtherCommunication;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ID) {
            $response[] = (string) $this->ID;
        }
        if ($this->Name) {
            $response[] = (string) $this->Name;
        }
        if ($this->Telephone) {
            $response[] = (string) $this->Telephone;
        }
        if ($this->Telefax) {
            $response[] = (string) $this->Telefax;
        }
        if ($this->ElectronicMail) {
            $response[] = (string) $this->ElectronicMail;
        }
        if ($this->Note) {
            foreach ($this->Note as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->OtherCommunication) {
            foreach ($this->OtherCommunication as $elem) {
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
