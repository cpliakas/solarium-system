<?php

/**
 * System request handler for Solarium.
 */

namespace Solarium\QueryType\System;

use Solarium\Core\Query\Query as BaseQuery;

/**
 * System query.
 */
class Query extends BaseQuery
{
    /**
     * Querytype system.
     */
    const QUERY_SYSTEM = 'system';

    /**
     * Default options for the "Stats.jsp" query type.
     *
     * @var array
     */
    protected $options = array(
        'resultclass' => 'Solarium\QueryType\System\Result',
        'handler' => 'admin/system',
    );

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return self::QUERY_SYSTEM;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestBuilder()
    {
        return new RequestBuilder();
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseParser()
    {
        return new ResponseParser();
    }
}
