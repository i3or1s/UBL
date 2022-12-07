<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\EmergencyProceduresCode;
use i3or1s\UBL\CBC\Extension;
use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\PlacardEndorsement;
use i3or1s\UBL\CBC\PlacardNotation;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_SecondaryHazard.html.
 */
final class SecondaryHazard implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:SecondaryHazard';

    public readonly ?ID $ID; // [0..1]    An identifier for this secondary hazard.
    public readonly ?PlacardNotation $PlacardNotation; // [0..1]    Text of the placard notation corresponding to the hazard class of this secondary hazard. Can also be the hazard identification number of the orange placard (upper part) required on the means of transport.
    public readonly ?PlacardEndorsement $PlacardEndorsement; // [0..1]    Text of the placard endorsement for this secondary hazard that is to be shown on the shipping papers for a hazardous item. Can also be used for the number of the orange placard (lower part) required on the means of transport.
    public readonly ?EmergencyProceduresCode $EmergencyProceduresCode; // [0..1]    A code signifying the emergency procedures for this secondary hazard.
    /** @var Extension[]|null */
    public readonly ?array $Extension; // [0..*]    Additional information about the hazardous substance, which can be used (for example) to specify the type of regulatory requirements that apply to this secondary hazard.

    /**
     * @param Extension[]|null $Extension
     */
    public function __construct(?ID $ID, ?PlacardNotation $PlacardNotation, ?PlacardEndorsement $PlacardEndorsement, ?EmergencyProceduresCode $EmergencyProceduresCode, ?array $Extension)
    {
        $this->ID = $ID;
        $this->PlacardNotation = $PlacardNotation;
        $this->PlacardEndorsement = $PlacardEndorsement;
        $this->EmergencyProceduresCode = $EmergencyProceduresCode;
        $this->Extension = $Extension;
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
        if ($this->EmergencyProceduresCode) {
            $response[] = (string) $this->EmergencyProceduresCode;
        }
        if ($this->Extension) {
            foreach ($this->Extension as $elem) {
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
