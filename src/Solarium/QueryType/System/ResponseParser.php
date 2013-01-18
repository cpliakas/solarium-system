<?php

/**
 *
 */

namespace Solarium\QueryType\System;
use Solarium\Core\Query\ResponseParser as ResponseParserAbstract;
use Solarium\Core\Query\ResponseParserInterface as ResponseParserInterface;

/**
 * Parse System response data
 */
class ResponseParser extends ResponseParserAbstract implements ResponseParserInterface
{
    /**
     * Implements \Solarium\Core\Query\ResponseParserInterface::parse().
     */
    public function parse($result)
    {
        $data = $result->getData();
        $result = array();

        $this->flattenArray($data, $result);

        return $this->addHeaderInfo($data, $result);
    }

    /**
     * Flattens the array into $result.
     */
    public function flattenArray(array $data, array &$result)
    {
        foreach ($data as $key => $value) {
            if (is_array($value) && !isset($data[$key][0])) {
                $this->flattenArray($data[$key], $result);
            } else {
                $result[$key] = $value;
            }
        }
    }
}
