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
        $result = $this->flattenData($data);
        return $this->addHeaderInfo($data, $result);
    }

    /**
     * Recursive method that flattens the raw data array.
     *
     * A hierarchy of "core" -> "directory" -> "data" is flattened to
     * "CoreDirectoryData". A hierarchy of "lucene" -> "lucene-impl-version" is
     * flattened to "LuceneImplVersion".
     *
     * @param array $data
     *   The raw data returned by the Solr server.
     * @param array &$parent_keys
     *   For internal use only, stores the parent keys of the current array.
     *
     * @return array
     *   The flattened array.
     */
    public function flattenData(array $data, array &$parent_keys = array())
    {
        $result = array();

        foreach ($data as $key => $value) {

            // Check if there is another level of the hierarchy. If the array is
            // keyed numerically then the data itself is an array, and we should
            // not recurse into it.
            if (is_array($value) && !isset($data[$key][0])) {

                // Capture parent key, recurse into next level of the hierarchy.
                $parent_keys[] = $key;
                $result += $this->flattenData($data[$key], $parent_keys);

            } else {

                // Break into parts so we can camel case at non-alphanumeric
                // characters. For example, "lucene-impl-version" will be
                // normalized to "LuceneImplVersion".
                $key_parts = preg_split('/[- ]/', $key);
                $normalized_key = $this->camelCaseArray($key_parts);

                // Prevent things like "SystemSystem" and "LuceneLucene" by
                // checking if the parent key matches first part of the
                // normalized key.
                $parent_key = end($parent_keys);
                reset($parent_keys);
                if (false !== stripos($normalized_key, $parent_key)) {
                    $normalized_key = substr($normalized_key, strlen($parent_key));
                }

                // Finalize the normalized key and store the value.
                $normalized_parents = $this->camelCaseArray($parent_keys);
                $result[$normalized_parents . $normalized_key] = $value;
            }
        }

        // Moving up a level in the hierarchy, so pop off the current parent.
        if ($parent_keys) {
            array_pop($parent_keys);
        }

        return $result;
    }

    /**
     * Concatenate and camel case an array.
     *
     * @param array $array
     *   The array being concatenated and camel cased.
     *
     * @return string
     */
    public function camelCaseArray(array $array)
    {
        return join('', array_map('ucfirst', $array));
    }
}
