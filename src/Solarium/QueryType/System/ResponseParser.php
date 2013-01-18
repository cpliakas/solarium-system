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
     * Recursive methid that flattens the array into $result.
     *
     * An array with a hierarchy of core -> directory -> data is normalized to
     * CoreDirectoryData.
     *
     * @param array $data
     *   The raw data returned by the Solr server.
     * @param array &$result
     *   The result array that the results are being normalized into.
     * @param array &$root_keys
     *   For internal use only, stored the parent keys of the current array.
     */
    public function flattenArray(array $data, array &$result, array &$root_keys = array())
    {
        foreach ($data as $key => $value) {
            if (is_array($value) && !isset($data[$key][0])) {
                $root_keys[] = $key;
                $this->flattenArray($data[$key], $result, $root_keys);
            } else {

                // Normalize the keys, prepend with root keys.
                $key_parts = preg_split('/[- ]/', $key);
                $merged_parts = array_merge($root_keys, $key_parts);

                // Prevents things like "SystemSystem" and "LuceneLucene".
                if (false !== strpos($merged_parts[1], $merged_parts[0])) {
                    unset($merged_parts[0]);
                }

                // Finalize the keys.
                $processed_key = join('', array_map('ucfirst', $merged_parts));
                $result[$processed_key] = $value;
            }
        }
        if ($root_keys) {
            array_pop($root_keys);
        }
    }
}
