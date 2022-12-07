<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CBC\Channel;
use i3or1s\UBL\CBC\ChannelCode;
use i3or1s\UBL\CBC\Value;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_CommunicationType.html.
 */
abstract class CommunicationType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:CommunicationType';

    public readonly ?ChannelCode $ChannelCode; // [0..1]    The method of communication, expressed as a code.
    public readonly ?Channel $Channel; // [0..1]    The method of communication, expressed as text.
    public readonly ?Value $Value; // [0..1]    An identifying value (phone number, email address, etc.) for this channel of communication

    public function __construct(?ChannelCode $ChannelCode, ?Channel $Channel, ?Value $Value)
    {
        $this->ChannelCode = $ChannelCode;
        $this->Channel = $Channel;
        $this->Value = $Value;
    }

    public function __toString()
    {
        $response = [];
        if ($this->ChannelCode) {
            $response[] = (string) $this->ChannelCode;
        }
        if ($this->Channel) {
            $response[] = (string) $this->Channel;
        }
        if ($this->Value) {
            $response[] = (string) $this->Value;
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
