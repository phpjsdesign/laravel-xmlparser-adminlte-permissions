<?php

namespace App\Services;

use Exception;

class ParserService
{
    protected XmlParser $xmlParser;

    public function __construct(XmlParser $xmlParser)
    {
        $this->xmlParser = $xmlParser;
    }

    /**
     * @throws Exception
     */
    public function parse($data, $contentType): array
    {
        if ($contentType == 'text/xml') {
            return $this->xmlParser->parse($data);
        } else {
            throw new Exception('Неверный тип контента');
        }
    }
}
