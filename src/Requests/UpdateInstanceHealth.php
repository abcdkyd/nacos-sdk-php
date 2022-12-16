<?php

namespace Nacos\Requests;

class UpdateInstanceHealth extends BaseRequest
{
    protected $uri = '/nacos/v1/ns/health/instance';

    protected $method = 'PUT';

    protected $params = [
        'namespaceId' => 0,
        'serviceName' => 1,
        'groupName' => 0,
        'clusterName' => 0,
        'ip' => 1,
        'port' => 1,
        'healthy' => 1,
    ];
}
