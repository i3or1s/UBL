<?php

namespace i3or1s\UBL\CAC;

use i3or1s\UBL\CBC\RailCarID;
use i3or1s\UBL\CBC\TrainID;

/**
 * http://www.datypic.com/sc/ubl21/e-cac_RailTransport.html.
 */
final class RailTransport implements \Stringable
{
    private const ELEMENT_SIGNATURE = 'cac:RailTransport';

    public readonly TrainID $TrainID; // [1..1]    An identifier for the train used as the means of transport.
    public readonly ?RailCarID $RailCarID; // [0..1]    An identifier for the rail car on the train used as the means of transport.

    public function __construct(TrainID $TrainID, ?RailCarID $RailCarID)
    {
        $this->TrainID = $TrainID;
        $this->RailCarID = $RailCarID;
    }

    public function __toString()
    {
        $response = [];
        $response[] = (string) $this->TrainID;
        if ($this->RailCarID) {
            $response[] = (string) $this->RailCarID;
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
