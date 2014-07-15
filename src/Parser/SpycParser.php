<?php

namespace AndyTruong\Yaml\Parser;

use AndyTruong\Yaml\Parser\YamlParserInterface;

class SpycParser implements YamlParserInterface
{

    public function parse($value, $exceptionOnInvalidType = false, $objectSupport = false, $objectForMap = false)
    {
        return spyc_load($value);
    }

}
