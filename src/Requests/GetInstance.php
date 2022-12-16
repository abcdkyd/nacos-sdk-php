<?php

namespace Nacos\Requests;

class GetInstance extends BaseRequest
{
    protected $uri = '/nacos/v1/ns/instance';

    protected $method = 'GET';

    protected $params = [
        'serviceName' => 1,
        'groupName' => 0,
        'ip' => 1,
        'port' => 1,
        'namespaceId' => 0,
        'cluster' => 0,
        'healthyOnly' => 0,
        'ephemeral' => 0,
    ];
}
