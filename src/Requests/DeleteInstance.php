<?php

namespace Nacos\Requests;

class DeleteInstance
{
    protected $uri = '/nacos/v1/ns/instance';

    protected $method = 'DELETE';

    protected $params = [
        'serviceName' => 1,
        'groupName' => 0,
        'ip' => 1,
        'port' => 1,
        'clusterName' => 0,
        'namespaceId' => 0,
        'ephemeral' => 0,
    ];
}
