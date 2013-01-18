<?php

/**
 * System request handler for Solarium.
 */

namespace Solarium\QueryType\System;

use Solarium\Core\Query\Result\QueryType as BaseResult;

/**
 * System query result.
 */
class Result extends BaseResult
{
    /**
     *
     */
    public function returnProperty($property)
    {
        $this->parseResponse();
        return $this->$property;
    }

    /**
     *
     */
    public function getArch()
    {
        return $this->returnProperty('arch');
    }

    /**
     *
     */
    public function getBootclasspath()
    {
        return $this->returnProperty('bootclasspath');
    }

    /**
     *
     */
    public function getClasspath()
    {
        return $this->returnProperty('classpath');
    }

    /**
     *
     */
    public function getSchema()
    {
        return $this->returnProperty('schema');
    }

    /**
     *
     */
    public function getDataDir()
    {
        return $this->returnProperty('data');
    }

    /**
     *
     */
    public function getIndexDir()
    {
        return $this->returnProperty('index');
    }

    /**
     *
     */
    public function getInstanceDir()
    {
        return $this->returnProperty('instance');
    }

    /**
     *
     */
    public function getMemoryFree()
    {
        return $this->returnProperty('free');
    }

    /**
     *
     */
    public function getMemoryMax()
    {
        return $this->returnProperty('max');
    }

    /**
     *
     */
    public function getMemoryTotal()
    {
        return $this->returnProperty('total');
    }

    /**
     *
     */
    public function getMemoryUsed()
    {
        return $this->returnProperty('used');
    }

}