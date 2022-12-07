<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\ValidateProcess;
use i3or1s\UBL\CBC\ValidateTool;
use i3or1s\UBL\CBC\ValidateToolVersion;
use i3or1s\UBL\CBC\ValidationDate;
use i3or1s\UBL\CBC\ValidationResultCode;
use i3or1s\UBL\CBC\ValidationTime;
use i3or1s\UBL\CBC\ValidatorID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_ResultOfVerification.html.
 */
final class ResultOfVerification implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:ExternalReference';

    public readonly ?ValidatorID $ValidatorID; // [0..1]    An identifier for the organization, person, service, or server that verified the signature.
    public readonly ?ValidationResultCode $ValidationResultCode; // [0..1]    A code signifying the result of the verification.
    public readonly ?ValidationDate $ValidationDate; // [0..1]    The date upon which verification took place.
    public readonly ?ValidationTime $ValidationTime; // [0..1]    The time at which verification took place.
    public readonly ?ValidateProcess $ValidateProcess; // [0..1]    The verification process.
    public readonly ?ValidateTool $ValidateTool; // [0..1]    The tool used to verify the signature.
    public readonly ?ValidateToolVersion $ValidateToolVersion; // [0..1]    The version of the tool used to verify the signature.
    public readonly ?SignatoryParty $SignatoryParty; // [0..1]    The signing party.

    public function __construct(?ValidatorID $ValidatorID, ?ValidationResultCode $ValidationResultCode, ?ValidationDate $ValidationDate, ?ValidationTime $ValidationTime, ?ValidateProcess $ValidateProcess, ?ValidateTool $ValidateTool, ?ValidateToolVersion $ValidateToolVersion, ?SignatoryParty $SignatoryParty)
    {
        $this->ValidatorID = $ValidatorID;
        $this->ValidationResultCode = $ValidationResultCode;
        $this->ValidationDate = $ValidationDate;
        $this->ValidationTime = $ValidationTime;
        $this->ValidateProcess = $ValidateProcess;
        $this->ValidateTool = $ValidateTool;
        $this->ValidateToolVersion = $ValidateToolVersion;
        $this->SignatoryParty = $SignatoryParty;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ValidatorID) {
            $response[] = (string) $this->ValidatorID;
        }
        if ($this->ValidationResultCode) {
            $response[] = (string) $this->ValidationResultCode;
        }
        if ($this->ValidationDate) {
            $response[] = (string) $this->ValidationDate;
        }
        if ($this->ValidationTime) {
            $response[] = (string) $this->ValidationTime;
        }
        if ($this->ValidateProcess) {
            $response[] = (string) $this->ValidateProcess;
        }
        if ($this->ValidateTool) {
            $response[] = (string) $this->ValidateTool;
        }
        if ($this->ValidateToolVersion) {
            $response[] = (string) $this->ValidateToolVersion;
        }
        if ($this->SignatoryParty) {
            $response[] = (string) $this->SignatoryParty;
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
