<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\AltitudeMeasure;
use i3or1s\UBL\CBC\CoordinateSystemCode;
use i3or1s\UBL\CBC\LatitudeDegreesMeasure;
use i3or1s\UBL\CBC\LatitudeDirectionCode;
use i3or1s\UBL\CBC\LatitudeMinutesMeasure;
use i3or1s\UBL\CBC\LongitudeDegreesMeasure;
use i3or1s\UBL\CBC\LongitudeDirectionCode;
use i3or1s\UBL\CBC\LongitudeMinutesMeasure;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_LocationCoordinate.html.
 */
final class LocationCoordinate implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:LocationCoordinate';

    public readonly ?CoordinateSystemCode $CoordinateSystemCode; // [0..1]    A code signifying the location system used.
    public readonly ?LatitudeDegreesMeasure $LatitudeDegreesMeasure; // [0..1]    The degree component of a latitude measured in degrees and minutes.
    public readonly ?LatitudeMinutesMeasure $LatitudeMinutesMeasure; // [0..1]    The minutes component of a latitude measured in degrees and minutes (modulo 60).
    public readonly ?LatitudeDirectionCode $LatitudeDirectionCode; // [0..1]    A code signifying the direction of latitude measurement from the equator (north or south).
    public readonly ?LongitudeDegreesMeasure $LongitudeDegreesMeasure; // [0..1]    The degree component of a longitude measured in degrees and minutes.
    public readonly ?LongitudeMinutesMeasure $LongitudeMinutesMeasure; // [0..1]    The minutes component of a longitude measured in degrees and minutes (modulo 60).
    public readonly ?LongitudeDirectionCode $LongitudeDirectionCode; // [0..1]    A code signifying the direction of longitude measurement from the prime meridian (east or west).
    public readonly ?AltitudeMeasure $AltitudeMeasure; // [0..1]    The altitude of the location.

    public function __construct(?CoordinateSystemCode $CoordinateSystemCode, ?LatitudeDegreesMeasure $LatitudeDegreesMeasure, ?LatitudeMinutesMeasure $LatitudeMinutesMeasure, ?LatitudeDirectionCode $LatitudeDirectionCode, ?LongitudeDegreesMeasure $LongitudeDegreesMeasure, ?LongitudeMinutesMeasure $LongitudeMinutesMeasure, ?LongitudeDirectionCode $LongitudeDirectionCode, ?AltitudeMeasure $AltitudeMeasure)
    {
        $this->CoordinateSystemCode = $CoordinateSystemCode;
        $this->LatitudeDegreesMeasure = $LatitudeDegreesMeasure;
        $this->LatitudeMinutesMeasure = $LatitudeMinutesMeasure;
        $this->LatitudeDirectionCode = $LatitudeDirectionCode;
        $this->LongitudeDegreesMeasure = $LongitudeDegreesMeasure;
        $this->LongitudeMinutesMeasure = $LongitudeMinutesMeasure;
        $this->LongitudeDirectionCode = $LongitudeDirectionCode;
        $this->AltitudeMeasure = $AltitudeMeasure;
    }

    public function __toString()
    {
        $response = [];
        if ($this->CoordinateSystemCode) {
            $response[] = (string) $this->CoordinateSystemCode;
        }
        if ($this->LatitudeDegreesMeasure) {
            $response[] = (string) $this->LatitudeDegreesMeasure;
        }
        if ($this->LatitudeMinutesMeasure) {
            $response[] = (string) $this->LatitudeMinutesMeasure;
        }
        if ($this->LatitudeDirectionCode) {
            $response[] = (string) $this->LatitudeDirectionCode;
        }
        if ($this->LongitudeDegreesMeasure) {
            $response[] = (string) $this->LongitudeDegreesMeasure;
        }
        if ($this->LongitudeMinutesMeasure) {
            $response[] = (string) $this->LongitudeMinutesMeasure;
        }
        if ($this->LongitudeDirectionCode) {
            $response[] = (string) $this->LongitudeDirectionCode;
        }
        if ($this->AltitudeMeasure) {
            $response[] = (string) $this->AltitudeMeasure;
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
