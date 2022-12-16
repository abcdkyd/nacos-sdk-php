<?php

namespace Nacos\Requests;

class UpdateInstance extends BaseRequest
{
    protected $uri = '/nacos/v1/ns/instance';

    protected $method = 'PUT';

    protected $params = [
        'serviceName' => 1,
        'groupName' => 0,
        'ip' => 1,
        'port' => 1,
        'clusterName' => 0,
        'namespaceId' => 0,
        'weight' => 0,
        'metadata' => 0,
        'enabled' => 0,
        'ephemeral' => 0,
    ];
}
