<?php

namespace Nacos\Requests;

class Beat extends BaseRequest
{
    protected $uri = '/nacos/v1/ns/instance/beat';

    protected $method = 'PUT';

    protected $params = [
        'serviceName' => 1,
        'ip' => 1,
        'port' => 1,
        'namespaceId' => 1,
        'groupName' => 0,
        'ephemeral' => 0,
        'beat' => 1,
    ];
}
