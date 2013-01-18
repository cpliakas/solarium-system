<?php

/**
 *
 */

namespace Solarium\QueryType\System;

use Solarium\Core\Query\RequestBuilder as BaseRequestBuilder;
use Solarium\Core\Query\QueryInterface;

/**
 * Build a System request
 */
class RequestBuilder extends BaseRequestBuilder
{
    /**
     * Overrides \Solarium\Core\Query\RequestBuilder::build().
     */
    public function build(QueryInterface $query)
    {
        $request = parent::build($query);
        $request->addParam('wt', 'json');
        return $request;
    }
}
