<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\CharacterSetCode;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\DocumentHash;
use i3or1s\UBL\CBC\EncodingCode;
use i3or1s\UBL\CBC\ExpiryDate;
use i3or1s\UBL\CBC\ExpiryTime;
use i3or1s\UBL\CBC\FileName;
use i3or1s\UBL\CBC\FormatCode;
use i3or1s\UBL\CBC\HashAlgorithmMethod;
use i3or1s\UBL\CBC\MimeCode;
use i3or1s\UBL\CBC\URI;

final class ExternalReference implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:ExternalReference';

    public readonly ?URI $URI; // [0..1]    The Uniform Resource Identifier (URI) that identifies the external object as an Internet resource.
    public readonly ?DocumentHash $DocumentHash; // [0..1]    A hash value for the externally stored object.
    public readonly ?HashAlgorithmMethod $HashAlgorithmMethod; // [0..1]    A hash algorithm used to calculate the hash value of the externally stored object.
    public readonly ?ExpiryDate $ExpiryDate; // [0..1]    The date on which availability of the resource can no longer be relied upon.
    public readonly ?ExpiryTime $ExpiryTime; // [0..1]    The time after which availability of the resource can no longer be relied upon.
    public readonly ?MimeCode $MimeCode; // [0..1]    A code signifying the mime type of the external object.
    public readonly ?FormatCode $FormatCode; // [0..1]    A code signifying the format of the external object.
    public readonly ?EncodingCode $EncodingCode; // [0..1]    A code signifying the encoding/decoding algorithm used with the external object.
    public readonly ?CharacterSetCode $CharacterSetCode; // [0..1]    A code signifying the character set of an external document.
    public readonly ?FileName $FileName; // [0..1]    The file name of the external object.
    /** @var Description[]|null */
    public readonly ?array $Description;  // [0..*]    A description of this period, expressed as text.

    /**
     * @param Description[]|null $Description
     */
    public function __construct(?URI $URI, ?DocumentHash $DocumentHash, ?HashAlgorithmMethod $HashAlgorithmMethod, ?ExpiryDate $ExpiryDate, ?ExpiryTime $ExpiryTime, ?MimeCode $MimeCode, ?FormatCode $FormatCode, ?EncodingCode $EncodingCode, ?CharacterSetCode $CharacterSetCode, ?FileName $FileName, ?array $Description)
    {
        $this->URI = $URI;
        $this->DocumentHash = $DocumentHash;
        $this->HashAlgorithmMethod = $HashAlgorithmMethod;
        $this->ExpiryDate = $ExpiryDate;
        $this->ExpiryTime = $ExpiryTime;
        $this->MimeCode = $MimeCode;
        $this->FormatCode = $FormatCode;
        $this->EncodingCode = $EncodingCode;
        $this->CharacterSetCode = $CharacterSetCode;
        $this->FileName = $FileName;
        $this->Description = $Description;
    }

    public function __toString()
    {
        $response = [];
        if ($this->URI) {
            $response[] = (string) $this->URI;
        }
        if ($this->DocumentHash) {
            $response[] = (string) $this->DocumentHash;
        }
        if ($this->HashAlgorithmMethod) {
            $response[] = (string) $this->HashAlgorithmMethod;
        }
        if ($this->ExpiryDate) {
            $response[] = (string) $this->ExpiryDate;
        }
        if ($this->ExpiryTime) {
            $response[] = (string) $this->ExpiryTime;
        }
        if ($this->MimeCode) {
            $response[] = (string) $this->MimeCode;
        }
        if ($this->FormatCode) {
            $response[] = (string) $this->FormatCode;
        }
        if ($this->EncodingCode) {
            $response[] = (string) $this->EncodingCode;
        }
        if ($this->CharacterSetCode) {
            $response[] = (string) $this->CharacterSetCode;
        }
        if ($this->FileName) {
            $response[] = (string) $this->FileName;
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
