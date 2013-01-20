Overview
========

An admin/system request handler for [Solarium](https://github.com/basdenooijer/solarium).

Usage
=====

    use Solarium\Client;
    use Solarium\QueryType\System\Query as SystemQuery;

    $client->registerQueryType(SystemQuery::QUERY_SYSTEM, 'Solarium\\QueryType\\System\\Query');
    $system = $client->createQuery(SystemQuery::QUERY_SYSTEM);
    $result = $client->execute($system);

    print 'Schema: ' . $result->getCoreSchema(); . PHP_EOL;
