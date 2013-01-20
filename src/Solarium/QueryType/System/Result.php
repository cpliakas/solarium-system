<?php

/**
 * System request handler for Solarium.
 */

namespace Solarium\QueryType\System;

use Solarium\Core\Query\Result\QueryType as BaseResult;

/**
 * Result object for admin/system queries.
 */
class Result extends BaseResult
{
    /**
     * Ensures the response is parsed and returns a property.
     *
     * @param string $property
     *   The name of the class member variable.
     *
     * @return mixed
     *   The value of the property.
     */
    public function returnProperty($property)
    {
        $this->parseResponse();
        return $this->$property;
    }

    /**
     * @return string
     */
    public function getCoreSchema()
    {
        return $this->returnProperty('CoreSchema');
    }

    /**
     * @return string
     */
    public function getCoreHost()
    {
        return $this->returnProperty('CoreHost');
    }

    /**
     * @return string
     */
    public function getCoreNow()
    {
        return $this->returnProperty('CoreNow');
    }

    /**
     * @return string
     */
    public function getCoreStart()
    {
        return $this->returnProperty('CoreStart');
    }

    /**
     * @return string
     */
    public function getCoreDirectoryInstance()
    {
        return $this->returnProperty('CoreDirectoryInstance');
    }

    /**
     * @return string
     */
    public function getCoreDirectoryData()
    {
        return $this->returnProperty('CoreDirectoryData');
    }

    /**
     * @return string
     */
    public function getCoreDirectoryIndex()
    {
        return $this->returnProperty('CoreDirectoryIndex');
    }

    /**
     * @return string
     */
    public function getLuceneSolrSpecVersion()
    {
        return $this->returnProperty('LuceneSolrSpecVersion');
    }

    /**
     * @return string
     */
    public function getLuceneSolrImplVersion()
    {
        return $this->returnProperty('LuceneSolrImplVersion');
    }

    /**
     * @return string
     */
    public function getLuceneSpecVersion()
    {
        return $this->returnProperty('LuceneSpecVersion');
    }

    /**
     * @return string
     */
    public function getLuceneImplVersion()
    {
        return $this->returnProperty('LuceneImplVersion');
    }

    /**
     * @return string
     */
    public function getJvmVersion()
    {
        return $this->returnProperty('JvmVersion');
    }

    /**
     * @return string
     */
    public function getJvmName()
    {
        return $this->returnProperty('JvmName');
    }

    /**
     * @return int
     */
    public function getJvmProcessors()
    {
        return $this->returnProperty('JvmProcessors');
    }

    /**
     * @return string
     */
    public function getJvmMemoryFree()
    {
        return $this->returnProperty('JvmMemoryFree');
    }

    /**
     * @return string
     */
    public function getJvmMemoryTotal()
    {
        return $this->returnProperty('JvmMemoryTotal');
    }

    /**
     * @return string
     */
    public function getJvmMemoryMax()
    {
        return $this->returnProperty('JvmMemoryMax');
    }

    /**
     * @return string
     */
    public function getJvmMemoryUsed()
    {
        return $this->returnProperty('JvmMemoryUsed');
    }

    /**
     * @return string
     */
    public function getJvmJmxBootclasspath()
    {
        return $this->returnProperty('JvmJmxBootclasspath');
    }

    /**
     * @return string
     */
    public function getJvmJmxClasspath()
    {
        return $this->returnProperty('JvmJmxClasspath');
    }

    /**
     * @return array
     */
    public function getJvmJmxCommandLineArgs()
    {
        return $this->returnProperty('JvmJmxCommandLineArgs');
    }

    /**
     * @return string
     */
    public function getJvmJmxStartTime()
    {
        return $this->returnProperty('JvmJmxStartTime');
    }

    /**
     * @return int
     */
    public function getJvmJmxUpTimeMS()
    {
        return $this->returnProperty('JvmJmxUpTimeMS');
    }

    /**
     * @return string
     */
    public function getSystemName()
    {
        return $this->returnProperty('SystemName');
    }

    /**
     * @return string
     */
    public function getSystemVersion()
    {
        return $this->returnProperty('SystemVersion');
    }

    /**
     * @return string
     */
    public function getSystemArch()
    {
        return $this->returnProperty('SystemArch');
    }

    /**
     * @return float
     */
    public function getSystemLoadAverage()
    {
        return $this->returnProperty('SystemLoadAverage');
    }

    /**
     * @return string
     */
    public function getSystemUname()
    {
        return $this->returnProperty('SystemUname');
    }

    /**
     * @return string
     */
    public function getSystemUlimit()
    {
        return $this->returnProperty('SystemUlimit');
    }

    /**
     * @return string
     */
    public function getSystemUptime()
    {
        return $this->returnProperty('SystemUptime');
    }
}
