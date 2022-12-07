<?php

namespace i3or1s\UBL\Util;

final class AttributeBuilder
{
    /**
     * @param string[] $attributes
     */
    public static function build(object $object, array $attributes): string
    {
        $response = [];
        foreach ($attributes as $objAttrib) {
            try {
                if ($object->$objAttrib) {
                    $response[] = sprintf('%s="%s"', $objAttrib, $object->$objAttrib);
                }
            } catch (\Throwable) {
            }
        }

        return implode(' ', $response);
    }
}
