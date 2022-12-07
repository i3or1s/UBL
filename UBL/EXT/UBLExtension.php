<?php

namespace i3or1s\UBL\EXT;

use i3or1s\UBL\CBC\ID;
use i3or1s\UBL\CBC\Name;

/**
 * http://www.datypic.com/sc/ubl21/e-ext_UBLExtension.html.
 */
final class UBLExtension implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'ext:UBLExtension';

    public readonly ?ID $ID; // [0..1]     An identifier for the Extension assigned by the creator of the extension.
    public readonly ?Name $Name; // [0..1]     A name for the Extension assigned by the creator of the extension.
    public readonly ?ExtensionAgencyID $ExtensionAgencyID; // [0..1]     An agency that maintains one or more Extensions.
    public readonly ?ExtensionAgencyName $ExtensionAgencyName; // [0..1]     The name of the agency that maintains the Extension.
    public readonly ?ExtensionVersionID $ExtensionVersionID; // [0..1]     The version of the Extension.
    public readonly ?ExtensionAgencyURI $ExtensionAgencyURI; // [0..1]     A URI for the Agency that maintains the Extension.
    public readonly ?ExtensionURI $ExtensionURI; // [0..1]     A URI for the Extension.
    public readonly ?ExtensionReasonCode $ExtensionReasonCode; // [0..1]     A code for reason the Extension is being included.
    public readonly ?ExtensionReason $ExtensionReason; // [0..1]     A description of the reason for the Extension.
    public readonly ExtensionContent $ExtensionContent; // [1..1]     The definition of the extension content.

    public function __construct(?ID $ID, ?Name $Name, ?ExtensionAgencyID $ExtensionAgencyID, ?ExtensionAgencyName $ExtensionAgencyName, ?ExtensionVersionID $ExtensionVersionID, ?ExtensionAgencyURI $ExtensionAgencyURI, ?ExtensionURI $ExtensionURI, ?ExtensionReasonCode $ExtensionReasonCode, ?ExtensionReason $ExtensionReason, ExtensionContent $ExtensionContent)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->ExtensionAgencyID = $ExtensionAgencyID;
        $this->ExtensionAgencyName = $ExtensionAgencyName;
        $this->ExtensionVersionID = $ExtensionVersionID;
        $this->ExtensionAgencyURI = $ExtensionAgencyURI;
        $this->ExtensionURI = $ExtensionURI;
        $this->ExtensionReasonCode = $ExtensionReasonCode;
        $this->ExtensionReason = $ExtensionReason;
        $this->ExtensionContent = $ExtensionContent;
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
        if ($this->ExtensionAgencyID) {
            $response[] = (string) $this->ExtensionAgencyID;
        }
        if ($this->ExtensionAgencyName) {
            $response[] = (string) $this->ExtensionAgencyName;
        }
        if ($this->ExtensionVersionID) {
            $response[] = (string) $this->ExtensionVersionID;
        }
        if ($this->ExtensionAgencyURI) {
            $response[] = (string) $this->ExtensionAgencyURI;
        }
        if ($this->ExtensionURI) {
            $response[] = (string) $this->ExtensionURI;
        }
        if ($this->ExtensionReasonCode) {
            $response[] = (string) $this->ExtensionReasonCode;
        }
        if ($this->ExtensionReason) {
            $response[] = (string) $this->ExtensionReason;
        }
        $response[] = (string) $this->ExtensionContent;

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
