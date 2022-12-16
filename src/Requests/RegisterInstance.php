<?php

namespace Nacos\Requests;

class RegisterInstance extends BaseRequest
{
    protected $uri = '/nacos/v1/ns/instance';

    protected $method = 'POST';

    protected $params = [
        'ip' => 1,
        'port' => 1,
        'namespaceId' => 0,
        'weight' => 0,
        'enabled' => 0,
        'healthy' => 0,
        'metadata' => 0,
        'clusterName' => 0,
        'serviceName' => 1,
        'groupName' => 0,
        'ephemeral' => 0,
    ];
}
